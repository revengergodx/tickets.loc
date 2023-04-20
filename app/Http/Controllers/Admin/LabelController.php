<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\Label\StoreRequest;
use App\Models\Label;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    public function index()
    {
        $labels = Label::all();
        return view('admin.labels.index', compact('labels'));
    }

    public function create()
    {
        return view('admin.labels.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Label::firstOrCreate($data);

        return redirect()->route('admin.label.index');
    }

    public function edit(Label $label)
    {
        return view('admin.labels.create', compact('label'));
    }

    public function update(Label $label, StoreRequest $request)
    {
        $data = $request->validated();
        $label->update($data);
        return redirect()->route('admin.label.index');
    }

    public function delete(Label $label)
    {
        $label->delete();
        return redirect()->route('admin.label.index');
    }

}
