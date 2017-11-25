<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;


class Event extends Model
{
    protected $table = 'event';
    public $timestamps = false;

    public function model(){
    	return $this->morphTo();
    }

    public function user(){
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function renderHTML4Admin(){
    	switch ($this->event_type) {
    		case 'REGISTER':
    			return '<a href="'. route('user.show', ['user' => $this->user->id]) . '">@' . $this->user->username . '</a> has joined us!';
    		case 'LOGIN':
    			return '<a href="'. route('user.show', ['user' => $this->user->id]) . '">@' . $this->user->username . '</a> has logged in!';
    		case 'LOGOUT':
    			return '<a href="'. route('user.show', ['user' => $this->user->id]) . '">@' . $this->user->username . '</a> has logged out!';

    		case 'SERIES_CREATE':
    			return 
    			'Series <a href="'. route('series.show', ['series' => $this->model->id]) .'"> ' . $this->model->title . '</a> 
    			is created by <a href="'. route('user.show', ['user' => $this->user->id]) . '">@' . $this->user->username . '</a>';
    		case 'SERIES_UPDATE':
    			return 
    			'Series <a href="'. route('series.show', ['series' => $this->model->id]) .'"> ' . $this->model->title . '</a> 
    			is updated by <a href="'. route('user.show', ['user' => $this->user->id]) . '">@' . $this->user->username . '</a>';
    		case 'SERIES_DELETE':
    			return 
    			'Series <a href="'. route('series.show', ['series' => $this->model->id]) .'"> ' . $this->model->title . '</a> 
    			is deleted by <a href="'. route('user.show', ['user' => $this->user->id]) . '">@' . $this->user->username . '</a>';
    		case 'SERIES_RESTORE':
    			return 
    			'Series <a href="'. route('series.show', ['series' => $this->model->id]) .'"> ' . $this->model->title . '</a> 
    			is deleted by <a href="'. route('user.show', ['user' => $this->user->id]) . '">@' . $this->user->username . '</a>';

    		case 'TUTORIAL_CREATE':
    			return 
    			'Tutorial <a href="'. route('series.tutorial.show', ['series' => $this->model->series->id, 'tutorial' => $this->model->id]) .'"> ' . $this->model->title . '</a> 
    			is created by <a href="'. route('user.show', ['user' => $this->user->id]) . '">@' . $this->user->username . '</a>';
    		case 'TUTORIAL_UPDATE':
    			return 
    			'Tutorial <a href="'. route('series.tutorial.show', ['series' => $this->model->series->id, 'tutorial' => $this->model->id]) .'"> ' . $this->model->title . '</a> 
    			is updated by <a href="'. route('user.show', ['user' => $this->user->id]) . '">@' . $this->user->username . '</a>';
    		case 'TUTORIAL_DELETE':
    			return 
    			'Tutorial <a href="'. route('series.tutorial.show', ['series' => $this->model->series->id, 'tutorial' => $this->model->id]) .'"> ' . $this->model->title . '</a> 
    			is deleted by <a href="'. route('user.show', ['user' => $this->user->id]) . '">@' . $this->user->username . '</a>';
    		case 'TUTORIAL_RESTORE':
    			return 
    			'Tutorial <a href="'. route('series.tutorial.show', ['series' => $this->model->series->id, 'tutorial' => $this->model->id]) .'"> ' . $this->model->title . '</a> 
    			is deleted by <a href="'. route('user.show', ['user' => $this->user->id]) . '">@' . $this->user->username . '</a>';
    		default:
    			return $this->description;
    	}
    }

    public function renderHTML4Profile(){
    	switch ($this->event_type) {
    		case 'REGISTER':
    			return 'You have joined Overcoded!';
    		case 'LOGIN':
    			return 'Logged in.';
    		case 'LOGOUT':
    			return 'Logged out.';

    		case 'SERIES_CREATE':
    			return 'You have created the series - <a href="'. route('series.public', ['series4public' => $this->model->id]) .'"> ' . $this->model->title . '</a>';
    		case 'SERIES_UPDATE':
    			return 'You have updated the series - <a href="'. route('series.public', ['series4public' => $this->model->id]) .'"> ' . $this->model->title . '</a>';
    		case 'SERIES_DELETE':
    			return 'You have deleted the series - <a href="'. route('series.public', ['series4public' => $this->model->id]) .'"> ' . $this->model->title . '</a>';
    		case 'SERIES_RESTORE':
    			return 'You have restored the series - <a href="'. route('series.public', ['series4public' => $this->model->id]) .'"> ' . $this->model->title . '</a>';

    		case 'TUTORIAL_CREATE':
    			return 'You have created the tutorial - <a href="'. route('tutorial.public', ['tutorialSlug' => $this->model->slug]) .'"> ' . $this->model->title . '</a>';
    		case 'TUTORIAL_UPDATE':
    			return 'You have updated the tutorial - <a href="'. route('tutorial.public', ['tutorialSlug' => $this->model->slug]) .'"> ' . $this->model->title . '</a>';
    		case 'TUTORIAL_DELETE':
    			return 'You have deleted the tutorial - <a href="'. route('tutorial.public', ['tutorialSlug' => $this->model->slug]) .'"> ' . $this->model->title . '</a>';
    		case 'TUTORIAL_RESTORE':
    			return 'You have restored the tutorial - <a href="'. route('tutorial.public', ['tutorialSlug' => $this->model->slug]) .'"> ' . $this->model->title . '</a>';
    		default:
    			return $this->description;
    	}
    }
}
