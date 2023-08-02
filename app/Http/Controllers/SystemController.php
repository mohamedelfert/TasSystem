<?php

namespace App\Http\Controllers;

use App\Http\Requests\SystemRequest;
use App\Models\System;
use Illuminate\Http\Request;

class SystemController extends Controller
{

    public function index(Request $request)
    {
        $systems = new System();

        if ($request->has('view_deleted')) {
            $systems =  $systems->onlyTrashed();
        }

        $systems = $systems->latest()->get();

        return view('dashboard.systems.index', compact('systems'));
    }

    public function create()
    {
        $system = new System;
        return view('dashboard.systems.create', compact('system'));
    }

    public function store(SystemRequest $request)
    {
        System::create($request->all());

        toast(__('main.data_added_successfully'), 'success');
        return redirect(route('admin.systems.index'));
    }

    public function edit($id)
    {
        $system = System::findOrFail($id);
        return view('dashboard.systems.edit', compact('system'));
    }

    public function update(SystemRequest $request, System $system)
    {
        $system->update($request->all());
        toast(__('main.data_updated_successfully'), 'success');
        return redirect(route('admin.systems.index'));
    }

    public function destroy($id)
    {
        $system = System::findOrFail($id);
        $system->delete();
        toast(__('main.data_deleted_successfully'), 'success');
        return redirect(route('admin.systems.index'));
    }

    public function restore($id)
    {
        System::withTrashed()->find($id)->restore();
        return back();
    }

    public function restoreAll()
    {
        System::onlyTrashed()->restore();
        return back();
    }
}
