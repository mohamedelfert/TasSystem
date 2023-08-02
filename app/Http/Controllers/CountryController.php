<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryRequest;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $countries = new Country();

        if ($request->has('view_deleted')) {
            $countries =  $countries->onlyTrashed();
        }

        $countries = $countries->latest()->get();

        return view('dashboard.countries.index', compact('countries'));
    }

    public function create()
    {
        $country = new Country;
        return view('dashboard.countries.create', compact('country'));
    }

    public function store(CountryRequest $request)
    {
        Country::create($request->all());
        toast(__('main.data_added_successfully'), 'success');
        return redirect(route('admin.countries.index'));
    }

    public function edit($id)
    {
        $country = Country::findOrFail($id);
        return view('dashboard.countries.edit', compact('country'));
    }

    public function update(CountryRequest $request, Country $country)
    {
        $country->update($request->all());
        toast(__('main.data_updated_successfully'), 'success');
        return redirect(route('admin.countries.index'));
    }

    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();
        toast(__('main.data_deleted_successfully'), 'success');
        return redirect(route('admin.countries.index'));
    }

    public function restore($id)
    {
        Country::withTrashed()->find($id)->restore();
        return back();
    }

    public function restoreAll()
    {
        Country::onlyTrashed()->restore();
        return back();
    }
}
