<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class UsersController extends Controller
{
    public function index() {
        $users = \App\User::all();
		return view('welcome', compact('users'));
    }
}
