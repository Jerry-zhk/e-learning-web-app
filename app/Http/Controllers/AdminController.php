<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Permission;
use App\Models\Series;
use App\Models\Tutorial;
use App\Models\Event;
use App\Models\SeriesPurchase;
use Carbon\Carbon;

class AdminController extends Controller
{

    public function index(Request $request){
		$today = Carbon::today();

    	$newUserCount = User::where('created_at', '>=', $today)->get()->count();
    	$purchaseCount = SeriesPurchase::where('created_at', '>=', $today)->get()->count();
    	$tutorialCount = Tutorial::withTrashed()->get()->count();
    	$activeUserCount = User::where('active', '=', 1)->get()->count();

    	$activities = Event::orderBy('created_at', 'DESC')->take(10)->get();
		$popularSeries = Series::get()->sortByDesc('purchase_count')->take(10);
    	return view('admin.home', compact(['newUserCount', 'purchaseCount', 'tutorialCount', 'activeUserCount', 'activities', 'popularSeries']));
    }

}
