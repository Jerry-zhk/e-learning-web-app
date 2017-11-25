<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Permission;
use App\Models\Series;
use App\Models\Event;

class AdminController extends Controller
{

    public function index(Request $request){
    	$activities = Event::orderBy('created_at', 'DESC')->take(10)->get();
    	return view('admin.home', compact(['activities']));
    }

}
