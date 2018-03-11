<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'user_id',
        'book_list',
        'book_list_quantity',
        'event_list',
        'event_list_quantity',
        'movie_list',
        'movie_list_quantity'
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
}
