<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{

    public function index(Request $request){
    	return view('admin.home');
    }

    public function member(Request $request){
    	if ($request->has('keyword')) {
    		$users = User::MatchKeyword($request->input('keyword'))->paginate(15);
    	}else{
    		$users = User::paginate(15);
    	}
    	
    	return view('admin.member', compact('users'));
    }
}
