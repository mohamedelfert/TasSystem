<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::latest()->get();
        return view('dashboard.countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = ['name' => 'required|unique:countries'];
        $data = $this->validate($request, $rules);

        $data['name'] = $request->name;
        Country::create($data);

        toast(__('Added successfully'), 'success');
        return redirect(route('admin.countries.index'));
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
        $country = Country::findOrFail($id);
        return view('dashboard.countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules = ['name' => 'required|unique:countries,name,' . $id];
        $data = $this->validate($request, $rules);

        $data['name'] = $request->name;
        $country = Country::findOrFail($id);
        $country->update($data);

        toast(__('Edited successfully'), 'success');
        return redirect(route('admin.countries.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $country = Country::findOrFail($id);
        $country->delete();
        toast(__('Deleted successfully'), 'success');
        return redirect(route('admin.countries.index'));
    }
}
