<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\SlotCreateRequest;
use App\Http\Requests\SlotEditRequest;
use App\Http\Requests\SlotTeacherRequest;
use App\Models\Branch;
use App\Models\Slot;
use App\Models\SlotTeacher;
use App\Models\SlotValidation;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Workday;
use Carbon\Carbon;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Http\Request;

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

    public function createSlot()
    {
        $slots = Slot::all();
        $workdays = Workday::all();
        return view('teacher-dashboard.slots.create_slots', compact('slots', 'workdays'));
    }

    public function doCreateSlot(SlotCreateRequest $request)
    {
        $slots = $request->input('slots', []);
        $count = 0;
        foreach ($slots as $array) {
            foreach ($array as $sub) {
                $count++;
            }
        }

        if ($count >= setting()->total) {
            $slotValidations = SlotValidation::all();

            foreach ($slotValidations as $validation) {
                $countValidation = 0;
                foreach ($slots as $key => $values) {
                    foreach ($values as $value) {
                        $slot = Slot::findOrFail($key);
                        if ($slot->start_at >= $validation->start && $slot->end_at <= $validation->end) {
                            $countValidation++;
                        }
                    }
                }

                if ($validation->number == $countValidation) {
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
                    return redirect()->back()
                        ->withErrors([
                            'errors' =>
                                __('main.slot_validation_required') .
                                Carbon::parse($validation->start)->timezone(auth()->user()->timezone)->format('g:i A')
                                . __('main.and_end_time')
                                . Carbon::parse($validation->end)->timezone(auth()->user()->timezone)->format('g:i A')
                                . __('main.is') . $validation->number
                                . ' ' . __('main.slots')
                        ]);
                }
            }
        } else {
            toast(__('main.slots_less_than_slot_accept'), 'error');
            return redirect()->back()->with($request->all())->withErrors(['errors' => trans('main.slots_less_than_slot_accept')]);
        }
    }

    public function editSlot($id)
    {
        $teacher = Teacher::findOrFail($id);
        $slots = Slot::all();
        $workdays = Workday::all();
        $slotsTeacher = SlotTeacher::where('teacher_id', auth()->user()->id)->get();
        return view('teacher-dashboard.slots.edit_slots', compact('teacher', 'slots', 'workdays', 'slotsTeacher'));
    }

    public function doEditSlot(SlotEditRequest $request, $id)
    {
        try {
            $details = $request;
            $teacher = Teacher::findOrFail($id);

            $slotTeacher = SlotTeacher::where('teacher_id', $teacher->id)
                ->where('slot_id', $request->old_slot_id)
                ->where('workday_id', $request->old_workday_id)
                ->first();

            $oldSlotsTeacher = SlotTeacher::where('teacher_id', $teacher->id)
                ->where('workday_id', $request->workday_id)
                ->pluck('slot_id', 'id')
                ->toArray();

            if ($slotTeacher->slot_id != $request->slot_id) {
                if (in_array($request->slot_id, $oldSlotsTeacher)) {
                    toast(__('main.slot_choose_before'), 'error');
                    return redirect()->back();
                } else {
//                $slotTeacher->update([
//                    'slot_id' => $request->slot_id,
//                    'workday_id' => $request->workday_id,
//                    'teacher_id' => $teacher->id
//                ]);
                    return view('teacher-dashboard.slots.checkout', compact('details'));
                }
            } else {
                toast(__('main.slot_choose_before'), 'error');
                return redirect()->back()->with($request->all())->withErrors(['errors' => trans('main.slot_choose_before')]);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function getSlots(Request $request)
    {
//        return SlotTeacher::where('teacher_id', auth()->user()->id)->where('workday_id', $request->id)->pluck('slot_id', 'id');
        return SlotTeacher::join('slots', 'slot_teacher.slot_id', 'slots.id')
            ->where('teacher_id', auth()->user()->id)
            ->where('workday_id', $request->id)
            ->select('slot_teacher.*', 'slots.start_at')
            ->pluck('slots.start_at', 'slot_id', 'id');
    }

    public function getNewSlots(Request $request)
    {
//        $slotTeacher = SlotTeacher::where('teacher_id', auth()->user()->id)->where('workday_id', $request->id)->pluck('slot_id', 'id')->toArray();
//        return SlotTeacher::where('teacher_id', auth()->user()->id)->where('workday_id', $request->id)->pluck('slot_id', 'id');
//        return Slot::get()->pluck('start_at', 'id');
        return Slot::join('slot_teacher', 'slots.id', 'slot_teacher.slot_id')
            ->join('workdays', 'workdays.id', 'slot_teacher.workday_id')
            ->where('teacher_id', auth()->user()->id)
            ->where('workday_id', '!=', $request->id)
            ->select('slots.*', 'slot_teacher.*')
            ->pluck('slots.start_at', 'slot_id', 'id');
    }

    public function pay(Request $request)
    {
        try {
            $charge = Stripe::charges()->create([
                'currency' => 'USD',
                'source' => $request->stripeToken,
                'amount' => $request->price,
                'description' => 'Payment From Tas System',
            ]);

            $chargeId = $charge['id'];

            if ($chargeId) {
                $slotTeacher = SlotTeacher::where('teacher_id', $request->teacher_id)
                    ->where('slot_id', $request->old_slot_id)
                    ->where('workday_id', $request->old_workday_id)
                    ->first();

                $slotTeacher->update([
                    'slot_id' => $request->slot_id,
                    'workday_id' => $request->workday_id,
                    'teacher_id' => $request->teacher_id
                ]);

                // fines create in fines table after pay
                $slotTeacher->fines()->create([
                    'payment_method_id' => 1,
                    'teacher_id' => $request->teacher_id,
                    'price' => $request->price,
                    'status' => 'paid',
                    'payment_date' => now(),
                    'fine_type_id' => $request->fine_type_id,
                ]);

                toast(__('Payment was done successfully'), 'success');
                return redirect()->route('teacher.slots.index');
            } else {
                return redirect()->back();
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }
}
