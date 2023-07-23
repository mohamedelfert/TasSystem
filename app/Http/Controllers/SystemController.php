<?php

namespace App\Http\Controllers;

use App\Http\Requests\SystemRequest;
use App\Models\System;
use Illuminate\Http\Request;

class SystemController extends Controller
{

    public function index()
    {
        $systems = System::latest()->get();
        return view('dashboard.systems.index', compact('systems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $system = new System;
        return view('dashboard.systems.create',compact('system'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SystemRequest $request)
    {
        System::create($request->all());

        toast(__('Added successfully'), 'success');
        return redirect(route('admin.systems.index'));
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
        $system = System::findOrFail($id);
        return view('dashboard.systems.edit', compact('system'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SystemRequest $request, System $system)
    {
        $system->update($request->all());
        toast(__('Edited successfully'), 'success');
        return redirect(route('admin.systems.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $system = System::findOrFail($id);
        $system->delete();
        toast(__('Deleted successfully'), 'success');
        return redirect(route('admin.systems.index'));
    }
}
