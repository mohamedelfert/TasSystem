<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\slotTeacherRequest;
use App\Models\Slot;
use App\Models\SlotTeacher;
use App\Models\Teacher;
use App\Models\Workday;
use Illuminate\Http\Request;

class SlotController extends Controller
{
    public function index()
    {
        $slots = Slot::latest()->get();
        $workdays = Workday::latest()->get();
        return view('teacher-dashboard.slots.index', compact('slots', 'workdays'));
    }

    public function store(SlotTeacherRequest $request)
    {

        $data = Teacher::findOrFail(auth()->user()->id);
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
            foreach ($values as $value){
                SlotTeacher::updateOrCreate([
                    'slot_id' => $key,
                    'workday_id' => $value,
                    'teacher_id' => auth()->user()->id
                ]);
            }
        }

        toast(__('main.data_added_successfully'), 'success');
        return redirect()->back();
    }
}
