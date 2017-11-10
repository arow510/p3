<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalcuController extends Controller
{
  public function index()
{


  return view('welcome');
}

public function calculation()
{


return view('calcu');
}

}
