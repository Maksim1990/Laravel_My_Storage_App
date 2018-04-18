<?php

namespace App\Http\Controllers;

use App\Book;
use App\ImageBook;
use App\ImageMovie;
use App\Movie;
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
     * @param  $module_id
     * @return \Illuminate\Http\Response
     */
    public function uploadMultipleImages($id, $module_id)
    {

        if ($module_id == 1) {
            $item = Book::findOrFail($id);
        } elseif ($module_id == 2) {
            $item = Movie::findOrFail($id);
        }

        $title = "Upload multiple images";
        return view('layouts.upload', compact('title', 'item', 'module_id'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item_id = $request['item_id'];
        $module_id = $request['module_id'];
        $file = $request->file('file');
        $user = Auth::user();
        if (!($file->getClientSize() > 2100000)) {
            $name = time() . "_" . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['path' => $name, 'user_id' => $user->id, 'module_id' => $module_id]);
            $photo_id = $photo->id;
            if ($module_id == 1) {
                ImageBook::create(['photo_id' => $photo_id, 'book_id' => $item_id]);
            } elseif ($module_id == 2) {
                ImageMovie::create(['photo_id' => $photo_id, 'movie_id' => $item_id]);
            }
        }
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



    public function deleteImage(Request $request)
    {
        $image_id = $request['image_id'];
        $module_id = $request['module_id'];
        $image = Photo::findOrFail($image_id);
        unlink(public_path() . $image->path);
        if($module_id==1){
            ImageBook::where('photo_id', $image->id)->delete();
            $book=Book::where('photo_id',$image->id)->first();
            if($book) {
                $book->update([
                    'photo_id' => 0,
                    'photo_path' => ''
                ]);
                $book->save();
            }
        }elseif ($module_id==2) {
            ImageMovie::where('photo_id', $image->id)->delete();
            $movie = Movie::where('photo_id', $image->id)->first();
            if ($movie) {
                $movie->update([
                    'photo_id' => 0,
                    'photo_path' => ''
                ]);
                $movie->save();
            }
        }


        $image->delete();



        return ["status" => true];
    }


}
