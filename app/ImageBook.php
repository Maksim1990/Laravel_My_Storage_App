<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageBook extends Model
{
    protected $fillable=[
        'book_id',
        'photo_id'
    ];
    public $with=['photo'];
    public function photo(){
        return $this->belongsTo('App\Photo');
    }
}
