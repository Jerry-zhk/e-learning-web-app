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
use App\Traits\Encryptable;
use App\Notifications\sendPasswordResetNotification;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;
    //use Encryptable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password', 'age', 'phone', 'verify_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $encryptable = [
        'name',
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
        return $series->price == 0 || $this->can('series&tutorial-free-access') || in_array($series->id, $this->purchased_series_list);
    }


    public function seriesPurchases(){
        return $this->hasMany(SeriesPurchase::class, 'user_id');
    }

    public function events(){
        return $this->hasMany(Event::class, 'user_id')->orderBy('created_at', 'DESC');
    }

    /**
     * Send a password reset email to the user
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new sendPasswordResetNotification($token));
    }

    public function scopeConsumer($query){
        return $query->has('seriesPurchases');
    }
}
