<?php

namespace App\Http\Controllers;

use App\Http\Requests\SlotValidationRequest;
use App\Http\Requests\SlotValidationTotalRequest;
use App\Models\Setting;
use App\Models\Slot;
use App\Models\SlotValidation;
use Illuminate\Http\Request;

class SlotValidationController extends Controller
{
    public function index(Request $request)
    {
        $slots = new SlotValidation();

        if ($request->has('view_deleted')) {
            $slots = $slots->onlyTrashed();
        }

        $slots = $slots->get();

        return view('dashboard.slots-validation.index', compact('slots'));
    }

    public function editSLotValidation()
    {
        $allSlots = Slot::all();
        return view('dashboard.slots-validation.create',compact('allSlots'));
    }

    public function doEditSLotValidation(SlotValidationRequest $request)
    {
        $setting = Setting::findOrFail(1);
        $setting['total'] = $request->total;
        $setting->update();

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
//            SlotValidation::create($request->all());
        }
        toast(__('main.data_added_successfully'), 'success');
        return redirect(route('admin.slots-validation.index'));
    }

    public function edit($id)
    {
        $slot = SlotValidation::findOrFail($id);
        $allSlots = Slot::all();
        return view('dashboard.slots-validation.edit', compact('slot','allSlots'));
    }

    public function update(SlotValidationRequest $request,$id)
    {
        $slot = SlotValidation::findOrFail($id);
        $slot->update($request->all());
        toast(__('main.data_updated_successfully'), 'success');
        return redirect(route('admin.slots-validation.index'));
    }

    public function destroy($id)
    {
        $slot = SlotValidation::findOrFail($id);
        $slot->delete();
        toast(__('main.data_deleted_successfully'), 'success');
        return redirect(route('admin.slots-validation.index'));
    }

    public function restore($id)
    {
        SlotValidation::withTrashed()->find($id)->restore();
        return back();
    }

    public function restoreAll()
    {
        SlotValidation::onlyTrashed()->restore();
        return back();
    }
}
