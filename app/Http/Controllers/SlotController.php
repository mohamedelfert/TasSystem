<?php

namespace App\Http\Controllers;

use App\Http\Requests\SlotRequest;
use App\Models\Slot;

class SlotController extends Controller
{
    public function index()
    {
        $slots = Slot::latest()->get();
        return view('dashboard.slots.index', compact('slots'));
    }

    public function create()
    {
        return view('dashboard.slots.create');
    }

    public function store(SlotRequest $request)
    {
        Slot::create($request->all());
        toast(__('Added successfully'), 'success');
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
        toast(__('Edited successfully'), 'success');
        return redirect(route('admin.slots.index'));
    }

    public function destroy($id)
    {
        $slot = Slot::findOrFail($id);
        $slot->delete();
        toast(__('Deleted successfully'), 'success');
        return redirect(route('admin.slots.index'));
    }
}
