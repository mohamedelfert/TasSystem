<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Country;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::latest()->get();
        return view('dashboard.branches.index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        return view('dashboard.branches.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:branches',
            'address' => 'required',
            'email' => 'required|email|unique:branches',
            'phone' => 'required|numeric|unique:branches',
            'status' => 'required',
            'country_id' => 'required',
            'lat' => 'required',
            'lng' => 'required'
        ];

        $data = $this->validate($request, $rules);

        Branch::create($request->all());

        toast(__('Added successfully'), 'success');
        return redirect(route('admin.branches.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $branch = Branch::findOrFail($id);
        return view('dashboard.branches.show', compact('branch'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $branch = Branch::findOrFail($id);
        $countries = Country::all();
        return view('dashboard.branches.edit', compact('branch', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|unique:branches,name,' . $id,
            'address' => 'required',
            'email' => 'required|email|unique:branches,email,' . $id,
            'phone' => 'required|numeric|unique:branches,phone,' . $id,
            'status' => 'required',
            'country_id' => 'required',
            'lat' => 'required',
            'lng' => 'required'
        ];

        $data = $this->validate($request, $rules);

        $branch = Branch::findOrFail($id);
        $branch->update($data);

        toast(__('Edited successfully'), 'success');
        return redirect(route('admin.branches.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $branch = Branch::findOrFail($id);
        $branch->delete();
        toast(__('Deleted successfully'), 'success');
        return redirect(route('admin.branches.index'));
    }
}
