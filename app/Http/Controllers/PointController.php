<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Point;

class PointController extends Controller
{
  public function index()
  {
    $points = Point::orderBy('name', 'ASC')->get();
    return view('points.index', compact('points'));
  }
  public function create()
  {
    return view('points.create');
  }
  public function store(Request $request)
  {
    Point::create($request->all());
    return redirect()->route('points.index');
    // return $request->all();
  }
}
