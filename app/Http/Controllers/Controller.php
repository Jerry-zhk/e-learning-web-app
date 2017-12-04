<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Skill;
use Auth;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(){
    	$this->middleware(function ($request, $next) {
            if(auth()->check())
            	view()->share('auth', auth()->user());

            return $next($request);
        });

        $skills = Skill::get()->groupBy('type')->toArray();
        view()->share('skillsList', $skills);
	}
}
