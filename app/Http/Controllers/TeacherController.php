<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Models\Teacher;
use Camroncade\Timezone\Facades\Timezone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::latest()->get();
        return view('dashboard.teachers.index', compact('teachers'));
    }

    public function create()
    {
        $timezone_select = Timezone::selectForm(
            'Europe/London',
            '',
            ['class' => 'form-control', 'name' => 'timezone']
        );
        return view('dashboard.teachers.create', compact('timezone_select'));
    }

    public function store(TeacherRequest $request)
    {
        $data = $request->except(['password']);
        $data['password'] = Hash::make($request->password);
        $data['timezone'] = $request->timezone;
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
}
