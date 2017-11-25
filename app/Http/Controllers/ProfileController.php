<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\ValidatePassword;
use Illuminate\Support\Facades\Hash;
use Auth;

class ProfileController extends Controller
{
    public function index(){
    	$user = Auth::user();
		return view('profile.index', compact('user'));
    }

    public function edit(){
		$user = Auth::user();
		return view('profile.edit', compact('user'));
    }

    public function update(Request $request){
    	$rules = [
            'name' => 'required|string|max:255',
            'age' => 'required|numeric',
            'phone' => 'required|string|min:8'
        ];
        if($request->filled('password'))
        	$rules['password'] = 'string|min:6|confirmed';

        if($request->filled('password') || $request->filled('password_confirmation'))
        	$rules['current_password'] = ['required', new ValidatePassword(auth()->user())];

    	$validatedData = $request->validate($rules);

    	$user = Auth::user();
    	$user->name = $validatedData['name'];
    	$user->age = $validatedData['age'];
    	$user->phone = $validatedData['phone'];
    	if(isset($validatedData['password']))
    		$user->password = Hash::make($validatedData['password']);
    	$user->save();
    	return redirect()->route('profile.edit');
    }

    public function series(){
    	$user = Auth::user();
    	$seriesPurchases = $user->seriesPurchases;
    	return view('profile.series-purchased', compact('seriesPurchases'));

    }

    public function activities(){
    	$user = Auth::user();
    	$activities = $user->events()->paginate(10);
    	return view('profile.activities', compact('activities'));
    }
}
