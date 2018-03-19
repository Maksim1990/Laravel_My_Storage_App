<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','account_type','sns_acc_id','avatar_url','first_name','last_name','status','role_id','is_active','photo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $with=['setting'];

    public function books()
    {
        return $this->hasMany('App\Book');
    }
    public function setting()
    {
        return $this->hasOne('App\Setting');
    }


    public function photo(){
        return $this->hasOne('App\Photo');
    }

}
