<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable=[
        'user_id',
        'status',
        'country',
        'city',
        'lastname',
        'user_gender',
        'photo_id',
        'birthdate'
    ];


    public $with=['photo'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }
}
