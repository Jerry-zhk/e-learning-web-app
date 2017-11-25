<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tutorial extends Model
{
	use SoftDeletes;
    protected $table = 'tutorial';
    protected $dates = ['deleted_at'];

    public function series(){
    	return $this->belongsTo(Series::class, 'series_id');
    }

    public function scopeMatchKeyword($query, $keyword){
        return $query->where('title', 'like', "%$keyword%");
    }

    public function events(){
        return $this->morphMany(Event::class, 'model');
    }
}
