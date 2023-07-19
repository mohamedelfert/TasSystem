<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequest;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class TeacherController extends Controller
{
    public function show($id)
    {
        $teacher = Teacher::findOrFail($id);

        if ($teacher->id !== auth()->user()->id) {
            abort(403);
        }

        return view('teacher-dashboard.teachers.show', compact('teacher'));
    }

    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);

        if ($teacher->id !== auth()->user()->id) {
            abort(403);
        }

        return view('teacher-dashboard.teachers.edit', compact('teacher'));
    }

    public function update(TeacherRequest $request, Teacher $teacher)
    {
        $data = $request->except(['password', 'image']);

        if ($request->password !== null) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->image) {

            if ($teacher->image !== 'default.png') {
                Storage::disk('public_uploads')->delete('/teachers_images/' . $teacher->image);
            }

            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/uploads/teachers_images/' . $request->image->hashName()));

            $data['image'] = $request->image->hashName();

        }

        $teacher->update($data);

        toast(__('Updated successfully'), 'success');
        return redirect(route('teacher.teachers.show', compact('teacher')));
    }
}
