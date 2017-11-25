<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use App\Models\SeriesPurchase;
use App\Models\Series;
use App\Models\Event;
use Cache;
use Carbon\Carbon;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password', 'age', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $observables = [
        'registered', 
        'login',
        'logout'
    ];

    public function scopeMatchKeyword($query, $keyword){
        return $query->where('name', 'like', "%$keyword%")
            ->orWhere('username', 'like', "%$keyword%")
            ->orWhere('email', 'like', "%$keyword%");
    }

    public function getPurchasedSeriesListAttribute(){
        $purchasedSeries = $this->seriesPurchases->pluck('series_id')->toArray();
        return $purchasedSeries;
    }

    public function accessibleToSeries(Series $series){
        return $series->price == 0 || in_array($series->id, $this->purchased_series_list);
    }


    public function seriesPurchases(){
        return $this->hasMany(SeriesPurchase::class, 'user_id');
    }

    public function events(){
        return $this->hasMany(Event::class, 'user_id')->orderBy('created_at', 'DESC');
    }
}
