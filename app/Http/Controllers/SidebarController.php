<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SidebarController extends Controller
{
    public function store(Request $request)
    {
    session(['sidebarState' => $request->sidebarState]);
    }
}
