<?php

namespace App\Http\Controllers;

use App\Models\Workday;
use Illuminate\Http\Request;

class WorkdayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workdays = Workday::latest()->get();
        return view('dashboard.workdays.index', compact('workdays'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.workdays.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'day' => 'required',
            'date' => 'required',
            'name_slot' => 'required',
        ];

        $data = $this->validate($request, $rules);

        Workday::create($request->all());

        toast(__('Added successfully'), 'success');
        return redirect(route('dashboard.workdays.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $workday = Workday::findOrFail($id);
        return view('dashboard.workdays.edit', compact('workday'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'day' => 'required',
            'date' => 'required',
            'name_slot' => 'required',
        ];

        $data = $this->validate($request, $rules);

        $workday = Workday::findOrFail($id);
        $workday->update($request->all());

        toast(__('Edited successfully'), 'success');
        return redirect(route('dashboard.workdays.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $workday = Workday::findOrFail($id);
        $workday->delete();
        toast(__('Deleted successfully'), 'success');
        return redirect(route('dashboard.workdays.index'));
    }
}
