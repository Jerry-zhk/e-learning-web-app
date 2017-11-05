<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Permission;
use App\Models\Series;

class AdminController extends Controller
{

    public function index(Request $request){
    	return view('admin.home');
    }

}
