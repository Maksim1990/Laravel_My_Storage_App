<?php

namespace App\Http\Controllers;

use App\Book;
use App\ImageBook;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhotoController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function uploadMultipleImages($id)
    {
        $book=Book::findOrFail($id);
        $title="Upload multiple images";
        return view('books.upload', compact('title','book'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book_id = $request['book_id'];
        $file=$request->file('file');
        $user=Auth::user();
        if(!($file->getClientSize()>2100000)) {
            $name = time() ."_". $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['path' => $name, 'user_id' => $user->id, 'module_id' => 1]);
            $photo_id = $photo->id;
            ImageBook::create(['photo_id' => $photo_id, 'book_id' => $book_id]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
