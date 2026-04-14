<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class demandecontroller extends Controller
{
    //
    public function index()
    {
        $demandes=Demande::all();
        $menutoday=MenuPlanning::where('day','2026-03-14')->first();
        return view('Trades.index',compact('demandes','menutoday'));
    }
}
