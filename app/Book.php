<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'user_id','title','description','image_id','publish_year','active'
    ];

    public $with=['user'];

    public function user(){
        return $this->belongsTo('App\User');
    }

}
