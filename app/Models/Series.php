<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Series extends Model
{
    use SoftDeletes;
    protected $table = 'series';
    protected $dates = ['deleted_at'];

    public function skills(){
    	return $this->belongsToMany(Skill::class, 'skill_series', 'series_id', 'skill_id');
    }

    public function tutorials(){
    	return $this->hasMany(Tutorial::class, 'series_id')->withTrashed();
    }

    public function purchases(){
        return $this->hasMany(SeriesPurchase::class, 'series_id');
    }

    public function scopeMatchKeyword($query, $keyword){
        return $query->where('title', 'like', "%$keyword%");
    }

    public function events(){
        return $this->morphMany(Event::class, 'model');
    }

    public function getPurchaseCountAttribute(){
        return $this->purchases->count();
    }
}
