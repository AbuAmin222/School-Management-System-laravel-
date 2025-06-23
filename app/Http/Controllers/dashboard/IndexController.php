<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function light()
    {
        return view('dashboard.light.index');
    }
    public function dark()
    {
        return view('dashboard.dark.index');
    }

}
