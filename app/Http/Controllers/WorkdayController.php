<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkdayRequest;
use App\Models\Workday;

class WorkdayController extends Controller
{
    public function index()
    {
        $workdays = Workday::latest()->get();
        return view('dashboard.workdays.index', compact('workdays'));
    }

    public function create()
    {
        return view('dashboard.workdays.create');
    }

    public function store(WorkdayRequest $request)
    {
        Workday::create($request->all());
        toast(__('Added successfully'), 'success');
        return redirect(route('admin.workdays.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $workday = Workday::findOrFail($id);
        return view('dashboard.workdays.edit', compact('workday'));
    }

    public function update(WorkdayRequest $request, Workday $workday)
    {
        $workday->update($request->all());
        toast(__('Edited successfully'), 'success');
        return redirect(route('admin.workdays.index'));
    }

    public function destroy($id)
    {
        $workday = Workday::findOrFail($id);
        $workday->delete();
        toast(__('Deleted successfully'), 'success');
        return redirect(route('admin.workdays.index'));
    }
}
