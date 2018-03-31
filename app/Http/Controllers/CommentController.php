<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

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
        $strStatus = $request['comment_id'];
        Comment::findOrFail($strStatus)->delete();
        return ["status" => $blnStatus];
    }

}
