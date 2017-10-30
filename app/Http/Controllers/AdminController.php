<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{

    public function index(Request $require){
    	return view('admin.home');
    }

    public function member(Request $require){
    	$users = User::paginate(15);
    	return view('admin.member', compact('users'));
    }
}
