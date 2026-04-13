<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class componentcontroller extends Controller
{
    //
    public function index()
    {
        //
        $components = Component::all();
        return view('component.index', compact('components'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('component.create');
    }


    public function edit(int $id)
    {
        //
        $component = Component::find($id);
        return view('component.edit',compact('component'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,int $id)
    {
        //
        $comp = Component::find($id);
        $comp->update([$request->all()]);
        return to_route('component.index');
    }
}
