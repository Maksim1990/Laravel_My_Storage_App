<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $upload="/images/";
    protected $fillable=[
        'path','user_id','module_id'
    ];

    /**
     * @return array
     */
    public function getPathAttribute($photo)
    {
        return $this->upload.$photo;
    }
}
