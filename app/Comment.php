<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id','module_id','item_id','comment','image_id'
    ];

    public $with=['user'];


    public function user(){
        return $this->belongsTo('App\User');
    }

}
