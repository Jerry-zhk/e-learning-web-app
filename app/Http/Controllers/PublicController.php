<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Series;
use App\Models\Tutorial;
use App\Models\seriesPurchase;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class PublicController extends Controller
{

	public function __construct(){
        parent::__construct();
        $this->middleware('auth', ['only' => ['seriesPurchase', 'tutorial']]);
    }

	public function index(){
		$today = Carbon::today();
		// new tutorials of user purchased series
		if(Auth::check()){
			$purchasedSeriesList = Auth::user()->purchased_series_list;
			$newTutorials = Tutorial::where('created_at', '>', $today->subDays(7))->whereIn('series_id', $purchasedSeriesList)->get()->take(9);
		}
		// popular series
		$popularSeries = Series::get()->sortByDesc('purchase_count')->take(6);
		// new series created in past 7 days
		$newSeries = Series::where('created_at', '>', $today->subDays(7))->orderBy('created_at', 'DESC')->get()->take(6);
		// free series
		$freeSeries = Series::where('price', '=', 0)->orderBy('created_at', 'DESC')->get()->take(6);
		$view = view('home', compact(['popularSeries', 'newSeries', 'freeSeries']));
		if(isset($newTutorials))
			return $view->with('new_tutorials', $newTutorials);
		else
			return $view;
	}

	public function search(Request $request){
		$results = collect();

		if ($request->has('keyword') && trim($request->input('keyword')) != '') {

			$series = Series::MatchKeyword($request->input('keyword'));
			$tutorials = Tutorial::MatchKeyword($request->input('keyword'));

			if($request->has('skill') && is_array($request->input('skill'))){
				$skillsWanted = $request->input('skill');
				foreach ($skillsWanted as $skillID) {
					$series->whereHas('skills', function( $query ) use ($skillID){
						$query->where('id', $skillID);
					});
					$tutorials->whereHas('series.skills', function( $query ) use ($skillID){
						$query->where('id', $skillID);
					});
				}
			}
			
			$series = $series->get();
			$tutorials = $tutorials->get();

			$s = collect($series);
			$t = collect($tutorials);
			$results = $s->merge($t);
		}else if($request->has('skill') && is_array($request->input('skill')) && count($request->input('skill')) == 1){
			$skillID = $request->input('skill')[0];
			$results = Series::whereHas('skills', function( $query ) use ($skillID){
				$query->where('id', $skillID);
			})->get();
		}else{
			$results = Series::get();
		}
		return view('search', compact('results'));
	}

	public function series(Series $series){
		return view('series', compact(['series']));
	}

	public function tutorial(Tutorial $tutorial){
		$user = auth()->user();
		return view('tutorial', compact(['tutorial', 'user']));
	}

	public function seriesPurchase(Series $series){
		$user = Auth::user();
		$purchase = new SeriesPurchase();
		$purchase->series_id = $series->id;
		$purchase->user_id = $user->id;
		$purchase->price = $series->price;
		$purchase->credit_card_no = str_random(16);
		$purchase->transaction_id = str_random(12);
		$purchase->save();
		event(new \App\Events\SeriesPurchased($user, $series));
		return redirect()->route('series.public', ['series4public' => $series->id]);
	}	
}
