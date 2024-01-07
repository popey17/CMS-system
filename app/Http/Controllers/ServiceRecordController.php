<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceRecord;

class ServiceRecordController extends Controller
{
    public function index()
    {
        $serviceRecords = ServiceRecord::paginate(12);
        return view('service-record.index',['serviceRecords'=>$serviceRecords]);
    }

    public function create()
    {
        return view('service-record.create');
    }
}
