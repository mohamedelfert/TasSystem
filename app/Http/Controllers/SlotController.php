<?php

namespace App\Http\Controllers;

use App\Http\Requests\SlotRequest;
use App\Models\Slot;
use Illuminate\Http\Request;

class SlotController extends Controller
{
    public function index(Request $request)
    {
        $slots = Slot::select("*");

        if ($request->has('view_deleted')) {
            $slots = $slots->onlyTrashed();
        }

        $slots = $slots->latest()->get();

        return view('dashboard.slots.index', compact('slots'));
    }

    public function create()
    {
        return view('dashboard.slots.create');
    }

    public function store(SlotRequest $request)
    {
        Slot::create($request->all());
        toast(__('main.data_added_successfully'), 'success');
        return redirect(route('admin.slots.index'));
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $slot = Slot::findOrFail($id);
        return view('dashboard.slots.edit', compact('slot'));
    }

    public function update(SlotRequest $request, Slot $slot)
    {
        $slot->update($request->all());
        toast(__('main.data_updated_successfully'), 'success');
        return redirect(route('admin.slots.index'));
    }

    public function destroy($id)
    {
        $slot = Slot::findOrFail($id);
        $slot->delete();
        toast(__('main.data_deleted_successfully'), 'success');
        return redirect(route('admin.slots.index'));
    }

    public function restore($id)
    {
        Slot::withTrashed()->find($id)->restore();
        return back();
    }

    public function restoreAll()
    {
        Slot::onlyTrashed()->restore();
        return back();
    }
}

