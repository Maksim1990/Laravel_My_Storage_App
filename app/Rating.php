<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'user_id','rating_value','module_number','item_number'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

}
