<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'user_id','title','description','photo_id','publish_year','active',
        'author','date','category_id'
    ];

    public $with=['user','photos','category'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function photos(){
        return $this->hasMany('App\ImageBook');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function photo(){
        return $this->hasOne('App\ImageBook');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

}
