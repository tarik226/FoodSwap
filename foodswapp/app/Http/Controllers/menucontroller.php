<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class menucontroller extends Controller
{
    //

    public function index()
    {
        //
        $menuoftoday=MenuPlanning::where('day','2026-03-28');
        $menus= Menu::all();
        return view('Menus.index',['menus' => $menus,'menuoftoday' => $menuoftoday]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $dessert=Component::all()->where('type','dessert');
        $main=Component::all()->where('type','main');
        $entry=Component::all()->where('type','entry');
        return view('Menus.create',['desserts' => $dessert, 'mains' => $main , 'entrys' => $entry]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuAddRequest $request)
    {
        //Component::find($request->entry_id)->is_vegan == true && Component::find($request->main_id)->is_vegan == true &&  
        // dd(Component::find($request->entry_id)->is_vegan,Component::find($request->main_id)->is_vegan,Component::find($request->dessert_id)->is_vegan);
        $menu=Menu::create($request->validated());
        if (Component::find($request->entry_id)->is_vegan == 1 && Component::find($request->main_id)->is_vegan == 1 && Component::find($request->dessert_id)->is_vegan == 1) {
            # code...
            $menu->is_vegan=1;
        }else{
            $menu->is_vegan=0;
        }
        $menu->save();
        return to_route('Menu.index');
    }
}
