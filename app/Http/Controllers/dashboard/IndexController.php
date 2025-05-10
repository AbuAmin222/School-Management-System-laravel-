<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('dashboard.light.index');
    }
    public function index2()
    {
        return view('dashboard.dark.index2');
    }
}
