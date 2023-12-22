<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\company;

class AdminController extends Controller
{
    public function show()
    {
        $company = company::first();

        return view('admin.index')->with('company', $company);
    }
}
