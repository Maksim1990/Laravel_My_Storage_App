<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'user_id','title','description','photo_id','publish_year','active',
        'author','date'
    ];

    public $with=['user','photos'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function photos(){
        return $this->hasMany('App\ImageBook');
    }

    public function photo(){
        return $this->hasOne('App\ImageBook');
    }

}
