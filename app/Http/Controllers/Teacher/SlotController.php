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
    public function index()
    {
        $slots = Slot::all();
        $workdays = Workday::all();

        $subjectsTeacher = Subject::join("subject_teacher", "subject_teacher.subject_id", "=", "subjects.id")
            ->where("subject_teacher.teacher_id", auth()->user()->id)->get();

        $branchesTeacher = Branch::join("branch_teacher", "branch_teacher.branch_id", "=", "branches.id")
            ->where("branch_teacher.teacher_id", auth()->user()->id)->get();

        return view('teacher-dashboard.slots.index', compact('slots', 'workdays', 'subjectsTeacher', 'branchesTeacher'));
    }

    public function create()
    {
        $slots = Slot::all();
        $workdays = Workday::all();
        return view('teacher-dashboard.slots.create', compact('slots', 'workdays'));
    }

    public function store(SlotTeacherRequest $request)
    {
        $teacher = Teacher::findOrFail(auth()->guard('teacher')->id());
        $teacher['language'] = $request->language;
        $teacher['place_type'] = $request->place_type;
        $teacher->update();

        if ($request->has('subjects')) {
            $request->user()->subjects()->sync($request->subjects);
        }

        if ($request->has('branches')) {
            $request->user()->branches()->sync($request->branches);
        }

        foreach ($request->input('slots', []) as $key => $values) {
            foreach ($values as $value) {
                SlotTeacher::create([
                    'slot_id' => $key,
                    'workday_id' => $value,
                    'teacher_id' => auth()->user()->id
                ]);
            }
        }

        $teacher['status'] = 'active';
        $teacher['work'] = 'yes';
        $teacher->update();

        toast(__('main.data_added_successfully'), 'success');
        return redirect(route('teacher.slots.index'));
    }

    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        $slots = Slot::all();
        $workdays = Workday::all();
        return view('teacher-dashboard.slots.edit', compact('teacher', 'slots', 'workdays'));
    }

    public function update(SlotTeacherRequest $request, $id)
    {
//        $slots = $request->input('slots',[]);
//
////        $count = count($slots);
//
//        foreach ($slots as $key => $values) {
//            $slot = Slot::findOrFail($key);
//            $start_at = $slot->start_at;
//            $count = count($values);
//            return $count;
//            foreach ($values as $value) {
//                return $value;
//            }
//        }

//        foreach ($slots as $key => $value) {
//            for ($i = $key; $i < $count; $i++) {
//                $slot = Slot::findOrFail($key);
//                $start_at = $slot->start_at;
//                if ($start_at == '16:00:00') {
//                    return 'yes ';
//                } else {
//                    return 'no ';
//                }
//                $i++;
//            }
//        }


        $teacher = Teacher::findOrFail($id);
        $teacher['language'] = $request->language;
        $teacher['place_type'] = $request->place_type;
        $teacher->update();

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

        $teacher['status'] = 'active';
        $teacher['work'] = 'yes';
        $teacher->update();

        toast(__('main.data_added_successfully'), 'success');
        return redirect(route('teacher.slots.index'));
    }
}
