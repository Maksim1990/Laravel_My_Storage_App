<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Book extends Model
{
    use Searchable;

    protected $fillable = [
        'user_id','title','description','photo_id','publish_year','active',
        'author','date','category_id','photo_path'
    ];

    public function toSearchableArray()
    {
        $record = $this->toArray();

        unset($record['photo_id'], $record['active'], $record['date'], $record['category_id'], $record['photo_path']);

        return $record;
    }


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
