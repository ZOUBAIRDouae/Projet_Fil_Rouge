<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Seance;

class SeanceController extends Controller
{
    public function index()
{
    $seances = Seance::all();
    return view('seances.index', compact('seances'));
}

}
