<?php

namespace App\Http\Controllers;

use App\Book;
use App\Favorite;
use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function addBookToFavorite(Request $request)
    {

        $blnStatus = true;
        $strStatus = $request['strStatus'];
        $item_number = $request['item_number'];
        $module_id = $request['module_id'];
        $user=Auth::user();

        if($strStatus=='like'){
            Favorite::create([
                'user_id'=>$user->id,
                'module_number'=>$module_id,
                'item_number'=>$item_number
            ]);
        }else{
            Favorite::where('user_id',$user->id)->where('module_number',$module_id)->where('item_number',$item_number)->delete();
        }


        return ["status" => $blnStatus];
    }

    public function myFavorites($id){
        $user=Auth::user();
        $favorites=Favorite::where('user_id',$user->id)->get();

        $arrBooks=array();
        $arrMovies=array();
        foreach ($favorites as $favorite){
            if($favorite->module_number==1){
                $arrBooks[]= $favorite->item_number;
            }elseif ($favorite->module_number==2){
                $arrMovies[]= $favorite->item_number;
            }
        }

        if(count($arrBooks)>0){
            $books=Book::whereIn('id', $arrBooks)->get();
        }else{
            $books=array();
        }

        if(count($arrMovies)>0){
            $movies=Movie::whereIn('id', $arrMovies)->get();
        }else{
            $movies=array();
        }

        $title='My favorites';
        return view('favorites.index', compact('title', 'movies','books'));
    }

}
