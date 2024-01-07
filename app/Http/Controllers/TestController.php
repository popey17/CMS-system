<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sale;

class TestController extends Controller
{
    public function index()
    {
        $sales = sale::get();
        return view('test')->with('sales', $sales);
    }

    public function testSubmit(Request $request)
    {
        dd($request->all());
    }
}
