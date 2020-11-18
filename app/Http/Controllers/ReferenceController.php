<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reference;
use App\Models\Point;

class ReferenceController extends Controller
{
  public function __invoke(Point $point)
    {
        return view('points.references', ['references' => $point->references()->get()]);
        //return view('points.references');
    }
    // public function __invoke()
    // {
    //     dd('main');
    // }
}
