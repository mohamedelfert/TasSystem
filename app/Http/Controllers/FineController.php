<?php

namespace App\Http\Controllers;

use App\Models\Fine;
use Illuminate\Http\Request;

class FineController extends Controller
{

    public function index()
    {
        $fines = Fine::latest()->get();
        return view('dashboard.fines.index', compact('fines'));
    }
    public function paid($id)
    {
        $fine = Fine::findOrFail($id);
        $fine->update(['status' => 'unpaid']);
        toast(__('main.data_updated_successfully'), 'success');
        return back();
    }

    public function unpaid($id)
    {
        $fine = Fine::findOrFail($id);
        $fine->update(['status' => 'paid']);
        toast(__('main.data_updated_successfully'), 'success');
        return back();
    }
}
