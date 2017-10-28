<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Series;

class Tutorial extends Model
{
    protected $table = 'tutorial';

    public function series(){
    	return $this->belongsTo(Series::class, 'series_id');
    }
}
