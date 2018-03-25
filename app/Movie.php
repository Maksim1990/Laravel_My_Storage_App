<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Movie extends Model
{
    use Searchable;

    protected $fillable = [
        'user_id','title','description','active',
        'author','finished_date','movie_created_year','category_id'
    ];

    public $with=['user','photos','category'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function photos(){
        return $this->hasMany('App\ImageMovie');
    }

    public function photo(){
        return $this->hasOne('App\ImageMovie');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

}
