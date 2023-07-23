<?php

namespace App\Http\Controllers;

use App\Http\Requests\BranchRequest;
use App\Models\Branch;
use App\Models\Country;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::latest()->get();
        return view('dashboard.branches.index', compact('branches'));
    }

    public function create()
    {
        $countries = Country::all();
        $branch = new Branch();
        return view('dashboard.branches.create', compact('countries','branch'));
    }

    public function store(BranchRequest $request)
    {
        Branch::create($request->all());
        toast(__('Added successfully'), 'success');
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
        $branch->update($request->all());
        toast(__('Edited successfully'), 'success');
        return redirect(route('admin.branches.index'));
    }

    public function destroy($id)
    {
        $branch = Branch::findOrFail($id);
        $branch->delete();
        toast(__('Deleted successfully'), 'success');
        return redirect(route('admin.branches.index'));
    }
}
