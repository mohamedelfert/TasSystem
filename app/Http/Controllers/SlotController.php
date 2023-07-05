<?php

namespace App\Http\Controllers;

use App\Models\Slot;
use Illuminate\Http\Request;

class SlotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slots = Slot::latest()->get();
        return view('dashboard.slots.index', compact('slots'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.slots.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:slots',
            'start_at' => 'required',
            'end_at' => 'required',
        ];

        $data = $this->validate($request, $rules);

        Slot::create($request->all());

        toast(__('Added successfully'), 'success');
        return redirect(route('dashboard.slots.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slot = Slot::findOrFail($id);
        return view('dashboard.slots.edit', compact('slot'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => 'required|unique:slots,name,' . $id,
            'start_at' => 'required',
            'end_at' => 'required',
        ];

        $data = $this->validate($request, $rules);

        $slot = Slot::findOrFail($id);
        $slot->update($request->all());

        toast(__('Edited successfully'), 'success');
        return redirect(route('dashboard.slots.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slot = Slot::findOrFail($id);
        $slot->delete();
        toast(__('Deleted successfully'), 'success');
        return redirect(route('dashboard.slots.index'));
    }
}
