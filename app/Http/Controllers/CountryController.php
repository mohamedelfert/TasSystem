<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryRequest;
use App\Models\Country;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::latest()->get();
        return view('dashboard.countries.index', compact('countries'));
    }

    public function create()
    {
        $country = new Country;
        return view('dashboard.countries.create',compact('country'));
    }

    public function store(CountryRequest $request)
    {
        Country::create($request->all());
        toast(__('Added successfully'), 'success');
        return redirect(route('admin.countries.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $country = Country::findOrFail($id);
        return view('dashboard.countries.edit', compact('country'));
    }

    public function update(CountryRequest $request, Country $country)
    {
        $country->update($request->all());
        toast(__('Edited successfully'), 'success');
        return redirect(route('admin.countries.index'));
    }

    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();
        toast(__('Deleted successfully'), 'success');
        return redirect(route('admin.countries.index'));
    }
}
