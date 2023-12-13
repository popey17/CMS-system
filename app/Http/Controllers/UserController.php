<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::orderBy('id', 'DESC')->paginate(5);
        return view('user.index', compact('users'));
    }

    public function getUserData()
    {
        $users = User::orderBy('id', 'DESC')->paginate(5);
        return response()->json([
            'users' => $users
        ]);
    }
}
