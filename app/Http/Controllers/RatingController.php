<?php

namespace App\Http\Controllers;

use App\Book;
use App\Movie;
use App\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function registerRating(Request $request)
    {
        $rating_value = $request['rating_value'];
        $module_number = $request['module_number'];
        $item_number = $request['item_number'];
        $user = Auth::user();

        Rating::create([
            'rating_value'=>$rating_value,
            'user_id'=>$user->id,
            'module_number'=>$module_number,
            'item_number'=>$item_number
        ]);


        return ["status" => true];
    }


    public function deleteRating(Request $request)
    {

        $blnStatus = true;
        $intRating = $request['rating_id'];
        Rating::findOrFail($intRating)->delete();
        return ["status" => $blnStatus];
    }

    public function myRatings($id){
        $user=Auth::user();
        $ratings=Rating::where('user_id',$user->id)->orderBy('id','DESC')->get();


        $books=Book::all();
        $movies=Movie::all();

        $arrMovies=array();
        foreach ($movies as $movie){
            $arrMovies[$movie->id]=$movie->title;
        }

        $arrBooks=array();
        foreach ($books as $book){
            $arrBooks[(int)$book->id]=$book->title;
        }


        $title='My ratings';
        return view('ratings.my_ratings', compact('title', 'ratings','arrBooks','arrMovies'));
    }

}
