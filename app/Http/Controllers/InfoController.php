<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function getUserInfo($id)
    {

        $title = 'User statistics';
        return view('info.index', compact('title'));
    }
}
