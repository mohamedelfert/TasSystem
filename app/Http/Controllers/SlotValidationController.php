<?php

namespace App\Http\Controllers;

use App\Http\Requests\SlotValidationRequest;
use App\Http\Requests\SlotValidationTotalRequest;
use App\Models\Setting;
use App\Models\Slot;
use App\Models\SlotValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SlotValidationController extends Controller
{
//    public function index(Request $request)
//    {
//        $slots = new SlotValidation();
//
//        if ($request->has('view_deleted')) {
//            $slots = $slots->onlyTrashed();
//        }
//
//        $slots = $slots->get();
//
//        return view('dashboard.slots-validation.index', compact('slots'));
//    }

    public function editSlotValidation()
    {
        $slotsValidation = SlotValidation::all();
        return view('dashboard.slots-validation.create', compact('slotsValidation'));
    }

    public function doEditSlotValidation(SlotValidationRequest $request)
    {
//        return $request->all();
        $setting = Setting::findOrFail(1);
        $setting['total'] = $request->total;
        $setting->update();

        DB::table('slot_validations')->delete();

        if ($request->has('start') and $request->has('end')) {
            $i = 0;
            foreach ($request->start as $key) {
                SlotValidation::create([
                    'start' => $key,
                    'end' => $request->end[$i],
                    'number' => $request->number[$i]
                ]);
                $i++;
            }
        }

//        if ($request->has('ids')) {
//            foreach ($request->ids as $id) {
//                $slot = SlotValidation::findOrFail($id);
//            }
//
//            if ($request->has('start') and $request->has('end')) {
//                $i = 0;
//                foreach ($request->start as $key) {
//                    $slot->update([
//                        'start' => $key,
//                        'end' => $request->end[$i],
//                        'number' => $request->number[$i]
//                    ]);
//                    $i++;
//                }
//            }
//        }else{
//            if ($request->has('start') and $request->has('end')) {
//                $i = 0;
//                foreach ($request->start as $key) {
//                    SlotValidation::create([
//                        'start' => $key,
//                        'end' => $request->end[$i],
//                        'number' => $request->number[$i]
//                    ]);
//                    $i++;
//                }
//            }
//        }

        toast(__('main.data_updated_successfully'), 'success');
        return redirect(route('admin.editSlotValidation'));
    }

    public function edit($id)
    {
        $slot = SlotValidation::findOrFail($id);
        $allSlots = Slot::all();
        return view('dashboard.slots-validation.edit', compact('slot', 'allSlots'));
    }

    public function update(SlotValidationRequest $request, $id)
    {
        $slot = SlotValidation::findOrFail($id);
        $slot->update($request->all());
        toast(__('main.data_updated_successfully'), 'success');
        return redirect(route('admin.slots-validation.index'));
    }

//    public function destroy($id)
//    {
//        $slot = SlotValidation::findOrFail($id);
//        $slot->delete();
//        toast(__('main.data_deleted_successfully'), 'success');
//        return redirect(route('admin.slots-validation.index'));
//    }
//
//    public function restore($id)
//    {
//        SlotValidation::withTrashed()->find($id)->restore();
//        return back();
//    }
//
//    public function restoreAll()
//    {
//        SlotValidation::onlyTrashed()->restore();
//        return back();
//    }
}
