<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageEvent extends Model
{
    protected $fillable=[
        'event_id',
        'photo_id'
    ];
    public $with=['photo'];
    public function photo(){
        return $this->belongsTo('App\Photo');
    }
}
