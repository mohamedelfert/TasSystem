<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Models\Teacher;
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
        return view('dashboard.teachers.create');
    }

    public function store(TeacherRequest $request)
    {
        $data = $request->except(['password']);
        $data['password'] = Hash::make($request->password);
        Teacher::create($data);
        toast(__('Added successfully'), 'success');
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
        toast(__('Edited successfully'), 'success');
        return redirect(route('admin.teachers.index'));
    }


    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        toast(__('Deleted successfully'), 'success');
        return redirect(route('admin.teachers.index'));
    }
}
