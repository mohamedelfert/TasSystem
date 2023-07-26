<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\SlotTeacherRequest;
use App\Models\Branch;
use App\Models\Slot;
use App\Models\SlotTeacher;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Workday;

class SlotController extends Controller
{
//    public function index()
//    {
//        $slots = Slot::latest()->get();
//        $workdays = Workday::latest()->get();
//        return view('teacher-dashboard.slots.index', compact('slots', 'workdays'));
//    }

    public function index()
    {
        $slots = Slot::latest()->get();

        $workdays = Workday::latest()->get();

        $subjectsTeacher = Subject::join("subject_teacher", "subject_teacher.subject_id", "=", "subjects.id")
            ->where("subject_teacher.teacher_id", auth()->user()->id)->get();

        $branchesTeacher = Branch::join("branch_teacher", "branch_teacher.branch_id", "=", "branches.id")
            ->where("branch_teacher.teacher_id", auth()->user()->id)->get();

        return view('teacher-dashboard.slots.index', compact('slots', 'workdays', 'subjectsTeacher', 'branchesTeacher'));
    }

    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);

        $slots = Slot::latest()->get();

        $workdays = Workday::latest()->get();

        return view('teacher-dashboard.slots.edit', compact('teacher', 'slots', 'workdays'));
    }

//    public function store(SlotTeacherRequest $request)
//    {
//
//        $data = Teacher::findOrFail(auth()->user()->id);
//        $data['language'] = $request->language;
//        $data['place_type'] = $request->place_type;
//        $data->update();
//
//        if ($request->has('subjects')) {
//            $request->user()->subjects()->sync($request->subjects);
//        }
//
//        if ($request->has('branches')) {
//            $request->user()->branches()->sync($request->branches);
//        }
//
//        foreach ($request->input('slots', []) as $key => $values) {
//            foreach ($values as $value){
//                SlotTeacher::updateOrCreate([
//                    'slot_id' => $key,
//                    'workday_id' => $value,
//                    'teacher_id' => auth()->user()->id
//                ]);
//            }
//        }
//
//        toast(__('main.data_added_successfully'), 'success');
//        return redirect()->back();
//    }

    public function update(SlotTeacherRequest $request, $id)
    {
        $data = Teacher::findOrFail($id);
        $data['language'] = $request->language;
        $data['place_type'] = $request->place_type;
        $data->update();

        if ($request->has('subjects')) {
            $request->user()->subjects()->sync($request->subjects);
        }

        if ($request->has('branches')) {
            $request->user()->branches()->sync($request->branches);
        }

        foreach ($request->input('slots', []) as $key => $values) {
            $slot = Slot::findOrFail($key);

            foreach ($values as $value) {
                SlotTeacher::updateOrCreate([
                    'slot_id' => $key,
                    'workday_id' => $value,
                    'teacher_id' => auth()->user()->id
                ]);
            }
        }

        $data['status'] = 'active';
        $data['work'] = 'yes';
        $data->update();

        toast(__('main.data_added_successfully'), 'success');
        return redirect(route('teacher.slots.index'));
    }
}
