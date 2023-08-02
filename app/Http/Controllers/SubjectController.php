<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectRequest;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(Request $request)
    {
        $subjects = new Subject();

        if ($request->has('view_deleted')) {
            $subjects =  $subjects->onlyTrashed();
        }

        $subjects = $subjects->latest()->get();

        return view('dashboard.subjects.index', compact('subjects'));
    }

    public function create()
    {
        $subject = new Subject;
        return view('dashboard.subjects.create', compact('subject'));
    }

    public function store(SubjectRequest $request)
    {
        Subject::create($request->all());
        toast(__('main.data_added_successfully'), 'success');
        return redirect(route('admin.subjects.index'));
    }

    public function show($id)
    {
        $subject = Subject::findOrFail($id);
        return view('dashboard.subjects.show', compact('subject'));
    }

    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('dashboard.subjects.edit', compact('subject'));
    }

    public function update(SubjectRequest $request, Subject $subject)
    {
        $subject->update($request->all());
        toast(__('main.data_updated_successfully'), 'success');
        return redirect(route('admin.subjects.index'));
    }

    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();
        toast(__('main.data_deleted_successfully'), 'success');
        return redirect(route('admin.subjects.index'));
    }

    public function restore($id)
    {
        Subject::withTrashed()->find($id)->restore();
        return back();
    }

    public function restoreAll()
    {
        Subject::onlyTrashed()->restore();
        return back();
    }
}
