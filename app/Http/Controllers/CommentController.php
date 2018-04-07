<?php

namespace App\Http\Controllers;

use App\Book;
use App\Comment;
use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
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


    public function addComment(Request $request)
    {
        $comment = $request['comment'];
        $user_id = $request['user_id'];
        $module_id = $request['module_id'];
        $item_id = $request['item_id'];
        $comment = Comment::create(['user_id' => $user_id, 'comment' => $comment, 'module_id' => $module_id, 'item_id' => $item_id]);

        return [
            "status" => true,
            "comment_id" => $comment->id,
        ];
    }

    public function deleteBookComment(Request $request)
    {

        $blnStatus = true;
        $intComment = $request['comment_id'];
        Comment::findOrFail($intComment)->delete();
        return ["status" => $blnStatus];
    }


    public function myComments($id){
        $user=Auth::user();
        $comments=Comment::where('user_id',$user->id)->orderBy('id','DESC')->paginate(10);
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



        $title='My comments';
        return view('comments.my_comments', compact('title', 'comments','arrBooks','arrMovies'));
    }

}
