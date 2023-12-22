<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SidebarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(Request $request)
    {
    session(['sidebarState' => $request->sidebarState]);
    }

    public function rightStore(Request $request)
    {
    session(['rightSidebarState' => $request->rightSidebarState]);
    }
}
