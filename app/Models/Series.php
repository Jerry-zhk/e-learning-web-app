<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Series extends Model
{
    protected $table = 'series';

    public function skills(){
    	return $this->belongsToMany(Skill::class, 'skill_series', 'series_id', 'skill_id');
    }

    public function tutorials(){
    	return $this->hasMany(Tutorial::class, 'series_id');
    }

    public function scopeMatchKeyword($query, $keyword){
        return $query->where('title', 'like', "%$keyword%");
    }
}
