<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skill';
    public $timestamps = false;
    protected $appends = ['series_count'];

    public function series(){
    	return $this->belongsToMany(Series::class, 'skill_series', 'skill_id', 'series_id');
    }

    public function getSeriesCountAttribute(){
    	return $this->series->count();
    }
}
