<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;


class SeriesPurchase extends Model
{
    protected $table = 'series_purchase';
    public $timestamps = false;

    public function series(){
        return $this->belongsTo(Series::class, 'series_id')->withTrashed();
    }

    public function user(){
        return $this->belongsTo(User::class, 'series_id');
    }
}
