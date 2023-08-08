<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\SlotInfoRequest;
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
        return view('teacher-dashboard.slots.create');
    }

    public function store(SlotTeacherRequest $request)
    {
        $teacher = Teacher::findOrFail(auth()->guard('teacher')->id());
        $teacher['place_type'] = $request->place_type;
        $teacher['language'] = $request->language;
        $teacher->update();

        if ($request->has('subjects')) {
            $request->user()->subjects()->sync($request->subjects);
        }

        if ($request->has('branches')) {
            $request->user()->branches()->sync($request->branches);
        }

        toast(__('main.data_added_successfully'), 'success');
        return redirect(route('teacher.slots.index'));
    }

    public function createSlot()
    {
        $slots = Slot::all();
        $workdays = Workday::all();
        return view('teacher-dashboard.slots.create_slots', compact('slots', 'workdays'));
    }

    public function doCreateSlot(SlotInfoRequest $request)
    {
        $slots = $request->input('slots', []);

//        return $slots;

        $count = 0;

        foreach ($slots as $array) {
            foreach ($array as $sub) {
                $count++;
            }
        }
//        return $count;

//        foreach ($slots as $key => $value) {
//            for ($i = 5; $i <= 7; $i++) {
//                $slot = Slot::findOrFail($key);
//                $start_at = $slot->start_at;
//                $start = '13:30:00';
//                $end = '16:00:00';
//                if ($start_at >= $start && $start_at <= $end) {
//                    return 'yes ';
//                } else {
//                    return 'no ';
//                }
//                $i++;
//            }
//        }

        if ($count >= setting()->slots_number_validation) {
            $teacher = Teacher::findOrFail(auth()->guard('teacher')->id());

            foreach ($slots as $key => $values) {
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
        } else {
            toast(__('main.slots_less_than_slot_accept'), 'error');
            return redirect()->back()->withErrors(['errors' => trans('main.slots_less_than_slot_accept')]);
        }
    }

    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teacher-dashboard.slots.edit', compact('teacher'));
    }

    public function update(SlotTeacherRequest $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher['place_type'] = $request->place_type;
        $teacher['language'] = $request->language;
        $teacher->update();

        if ($request->has('subjects')) {
            $request->user()->subjects()->sync($request->subjects);
        }

        if ($request->has('branches')) {
            $request->user()->branches()->sync($request->branches);
        }

        toast(__('main.data_updated_successfully'), 'success');
        return redirect(route('teacher.slots.index'));
    }

    public function editSlot($id)
    {
        $teacher = Teacher::findOrFail($id);
        $slots = Slot::all();
        $workdays = Workday::all();
        return view('teacher-dashboard.slots.edit_slots', compact('teacher', 'slots', 'workdays'));
    }

    public function doEditSlot(SlotInfoRequest $request, $id)
    {
        $slots = $request->input('slots', []);

//        return $slots;

        $count = 0;

        foreach ($slots as $array) {
            foreach ($array as $sub) {
                $count++;
            }
        }

        if ($count >= setting()->slots_number_validation) {
            $teacher = Teacher::findOrFail($id);

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

            toast(__('main.data_updated_successfully'), 'success');
            return redirect(route('teacher.slots.index'));
        } else {
            toast(__('main.slots_less_than_slot_accept'), 'error');
            return redirect()->back()->withErrors(['errors' => trans('main.slots_less_than_slot_accept')]);
        }
    }
}
