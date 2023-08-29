<?php

namespace App\Http\Controllers;

use App\Http\Requests\BranchRequest;
use App\Models\Branch;
use App\Models\Country;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index(Request $request)
    {
        $branches = new Branch();

        if ($request->has('view_deleted')) {
            $branches = $branches->onlyTrashed();
        }

        $branches = $branches->latest()->get();

        return view('dashboard.branches.index', compact('branches'));
    }

    public function create()
    {
        $countries = Country::all();
        $branch = new Branch();
        return view('dashboard.branches.create', compact('countries', 'branch'));
    }

    public function store(BranchRequest $request)
    {
        $country = Country::where('id', $request->country_id)->first();

        Branch::create([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'code' => $country->code,
            'phone' => $request->phone,
            'status' => $request->status,
            'country_id' => $request->country_id,
            'lat' => $request->lat,
            'lng' => $request->lng,
        ]);
        toast(__('main.data_added_successfully'), 'success');
        return redirect(route('admin.branches.index'));
    }

    public function show($id)
    {
        $branch = Branch::findOrFail($id);
        return view('dashboard.branches.show', compact('branch'));
    }

    public function edit($id)
    {
        $branch = Branch::findOrFail($id);
        return view('dashboard.branches.edit', compact('branch'));
    }

    public function update(BranchRequest $request, Branch $branch)
    {
        $country = Country::where('id', $request->country_id)->first();
        $branch->update([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'code' => $country->code,
            'phone' => $request->phone,
            'status' => $request->status,
            'country_id' => $request->country_id,
            'lat' => $request->lat,
            'lng' => $request->lng,
        ]);
        toast(__('main.data_updated_successfully'), 'success');
        return redirect(route('admin.branches.index'));
    }

    public function destroy($id)
    {
        $branch = Branch::findOrFail($id);
        $branch->delete();
        toast(__('main.data_deleted_successfully'), 'success');
        return redirect(route('admin.branches.index'));
    }

    public function restore($id)
    {
        Branch::withTrashed()->find($id)->restore();
        return back();
    }

    public function restoreAll()
    {
        Branch::onlyTrashed()->restore();
        return back();
    }
}
