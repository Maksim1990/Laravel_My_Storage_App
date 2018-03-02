<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'user_id','title','description','photo_id','publish_year','active',
        'author','date'
    ];

    public $with=['user'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

}
