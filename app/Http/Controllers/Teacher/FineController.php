<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Fine;
use Illuminate\Http\Request;

class FineController extends Controller
{
    public function index()
    {
        $fines = Fine::with('teacher')->where('teacher_id', auth()->user()->id)
            ->latest()->paginate(10);
        return view('teacher-dashboard.fines.index', compact('fines'));
    }

    public function payFine($id)
    {
        $fine = Fine::findOrFail($id);
        $fine->update([
            'status' => 'paid',
            'payment_date' => now()
        ]);
        toast(__('main.fine_paid_successfully'), 'success');
        return back();
    }
}
