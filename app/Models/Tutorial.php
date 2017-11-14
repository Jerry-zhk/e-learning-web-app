<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    protected $table = 'tutorial';

    public function series(){
    	return $this->belongsTo(Series::class, 'series_id');
    }

    public function scopeMatchKeyword($query, $keyword){
        return $query->where('title', 'like', "%$keyword%");
    }
}
