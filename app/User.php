<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use Notifiable,Searchable,Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','account_type','sns_acc_id','avatar_url','first_name','last_name','status','role_id','is_active','photo_id',
        'stripe_id','card_brand','card_last_four','trial_ends_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function toSearchableArray()
    {
        $record = $this->toArray();

        unset(
            $record['password'],
            $record['account_type'],
            $record['sns_acc_id'],
            $record['status'],
            $record['role_id'],
            $record['is_active'],
            $record['stripe_id'],
            $record['card_brand'],
            $record['card_last_four'],
            $record['trial_ends_at']
        );

        return $record;
    }

    public $with=['setting','profile'];

    public function books()
    {
        return $this->hasMany('App\Book');
    }
    public function movies()
    {
        return $this->hasMany('App\Movie');
    }

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    public function setting()
    {
        return $this->hasOne('App\Setting');
    }


    public function photo(){
        return $this->hasOne('App\Photo');
    }

}
