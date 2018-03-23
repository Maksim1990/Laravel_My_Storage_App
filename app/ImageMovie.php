<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageMovie extends Model
{
    protected $fillable=[
        'movie_id',
        'photo_id'
    ];
    public $with=['photo'];
    public function photo(){
        return $this->belongsTo('App\Photo');
    }
}
