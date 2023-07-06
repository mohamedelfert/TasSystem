<?php
namespace App\Http\Controllers;

use App\Models\System;
use Illuminate\Http\Request;

class SystemController extends Controller {

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
        return view('dashboard.systems.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = ['name' => 'required|unique:systems'];
        $validate_msg = [
            'name.required' => 'يجب كتابه اسم النظام',
            'name.unique' => 'اسم النظامٍ مسجل مسبقا',
        ];
        $data = $this->validate($request, $rules, $validate_msg);

        $data['name'] = $request->name;
        System::create($data);

        toast(__('Added successfully'), 'success');
        return redirect(route('dashboard.systems.index'));
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
        $system = System::findOrFail($id);

        return view('dashboard.systems.edit', compact('system'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules = ['name' => 'required|unique:systems,name,' . $id];
        $validate_msg = [
            'name.required' => 'يجب كتابه اسم النظام',
            'name.unique' => 'اسم النظام مسجل مسبقا',
        ];
        $data = $this->validate($request, $rules, $validate_msg);

        $data['name'] = $request->name;
        $system = System::findOrFail($id);
        $system->update($data);

        toast(__('Edited successfully'), 'success');
        return redirect(route('dashboard.systems.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $system = System::findOrFail($id);
        $system->delete();
        toast(__('Deleted successfully'), 'success');
        return redirect(route('dashboard.systems.index'));
    }
}
