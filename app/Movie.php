<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'user_id','title','description','active',
        'author','finished_date','movie_created_year'
    ];

    public $with=['user','photos'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function photos(){
        return $this->hasMany('App\ImageMovie');
    }

    public function photo(){
        return $this->hasOne('App\ImageMovie');
    }
}
