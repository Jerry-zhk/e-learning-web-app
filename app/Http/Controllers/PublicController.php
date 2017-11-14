<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Series;
use App\Models\Tutorial;

class PublicController extends Controller
{
	public function index()
	{
		return view('home');
	}

	public function search(Request $request)
	{
		$skillGroups = Skill::get()->groupBy('type');
		$results = [];

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

			foreach ($series as $s) 
				array_push($results, $s);

			foreach ($tutorials as $tutorial) 
				array_push($results, $tutorial);
		}

		return view('search', compact(['skillGroups', 'results']));
	}
}
