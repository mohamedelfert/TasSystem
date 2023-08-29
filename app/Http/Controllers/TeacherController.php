<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Models\Country;
use App\Models\Teacher;
use Camroncade\Timezone\Facades\Timezone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
        $teachers = new Teacher();

        if ($request->has('view_deleted')) {
            $teachers = $teachers->onlyTrashed();
        }

        $teachers = $teachers->latest()->get();

        return view('dashboard.teachers.index', compact('teachers'));
    }

    public function create()
    {
        $timezone_select = Timezone::selectForm(
            'Europe/London',
            '',
            ['class' => 'form-control select2', 'name' => 'timezone']
        );
        return view('dashboard.teachers.create', compact('timezone_select'));
    }

    public function store(TeacherRequest $request)
    {
        $country = Country::where('id', $request->country_id)->first();
        $data = $request->except(['password']);
        $data['password'] = Hash::make($request->password);
        $data['timezone'] = $request->timezone;
        $data['code'] = $country->code;
        Teacher::create($data);
        toast(__('main.data_added_successfully'), 'success');
        return redirect(route('admin.teachers.index'));
    }

    public function show($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('dashboard.teachers.show', compact('teacher'));
    }

    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('dashboard.teachers.edit', compact('teacher'));
    }

    public function update(TeacherRequest $request, Teacher $teacher)
    {
        $data = $request->except(['password']);

        if ($request->password != null) {
            $data['password'] = Hash::make($request->password);
        }
        $teacher->update($data);
        toast(__('main.data_updated_successfully'), 'success');
        return redirect(route('admin.teachers.index'));
    }

    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        toast(__('main.data_deleted_successfully'), 'success');
        return redirect(route('admin.teachers.index'));
    }

    public function restore($id)
    {
        Teacher::withTrashed()->find($id)->restore();
        return back();
    }

    public function restoreAll()
    {
        Teacher::onlyTrashed()->restore();
        return back();
    }
}
