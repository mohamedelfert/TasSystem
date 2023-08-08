<?php

namespace App\Http\Controllers;

use App\Http\Requests\FineTypeRequest;
use App\Models\FineType;

class FineTypeController extends Controller
{
    public function index()
    {
        $fineTypes = FineType::latest()->get();
        return view('dashboard.fine-types.index', compact('fineTypes'));
    }

    public function create()
    {
        $fineType = new FineType();
        return view('dashboard.fine-types.create', compact('fineType'));
    }

    public function store(FineTypeRequest $request)
    {
        FineType::create($request->all());
        toast(__('main.data_added_successfully'), 'success');
        return redirect(route('admin.fine-types.index'));
    }

    public function edit($id)
    {
        $fineType = FineType::findOrFail($id);
        return view('dashboard.fine-types.edit', compact('fineType'));
    }

    public function update(FineTypeRequest $request, FineType $fine_type)
    {
        $fine_type->update($request->all());
        toast(__('main.data_updated_successfully'), 'success');
        return redirect(route('admin.fine-types.index'));
    }
}
