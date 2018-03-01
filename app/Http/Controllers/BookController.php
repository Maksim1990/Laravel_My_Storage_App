<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\BookCreateRequest;
use App\ImageBook;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $test = "ttt";
        return view('books.index', compact('test'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $title = 'Add new book';
        return view('books.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookCreateRequest $request)
    {
        $file = $request->file('photo_id');
        if (!($file->getClientSize() > 2100000)) {
            $input = $request->all();
            $user = Auth::user();
            if ($file = $request->file('photo_id')) {
                $name = time() . "_" . $file->getClientOriginalName();
                $file->move('images', $name);
                $photo = Photo::create(['path' => $name, 'user_id' => $user->id]);
                $input['photo_id'] = $photo->id;
            }
            $input['user_id'] = $user->id;
            $input['active'] = 1;
            $book = Book::create($input);
            Session::flash('book_change', 'New book has been successfully created!');

            ImageBook::create(['book_id' => $book->id, 'photo_id' => $input['photo_id']]);
            Session::flash('book_change', 'New book has been successfully created!');
            return redirect('books/' . $book->id);
        } else {
            Session::flash('book_change', 'Image size should not exceed 2 MB');
            return redirect('books/create');
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
        $book = Book::findOrFail($id);

        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        //$adds=Advertisement::where('user_id',Auth::id())->pluck('title','id')->all();
        //$types=CommunityType::pluck('name','id')->all();

        $title = 'Edit book';
        return view('books.edit', compact('book', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookCreateRequest $request, $id)
    {
        $book = Book::findOrFail($id);
        $input = $request->all();

        if ($file = $request->file('photo_id')) {
            if (!($file->getClientSize() > 2100000)) {
                if ($book->image->photo) {
                    unlink(public_path() . $book->image->photo->path);
                }
                $photo_user = Photo::findOrFail($book->photo_id);
                $photo_user->delete();

                $name = time() . "_" . $file->getClientOriginalName();
                $file->move('images', $name);
                $photo = Photo::create(['path' => $name]);
                $input['photo_id'] = $photo->id;
                $imageAdd = ImageBook::where('book_id', $id)->first();
                if ($imageAdd) {
                    $imageAdd->photo_id = $input['photo_id'];
                    $imageAdd->save();
                } else {
                    ImageBook::create(['book_id' => $id, 'photo_id' => $input['photo_id']]);
                }

            } else {
                Session::flash('book_change', 'Image size should not exceed 2 MB');
                return redirect('books/' . $id . '/edit');
            }
        }
        $book->update($input);
        Session::flash('book_change', 'Book has been successfully updated!');
        return redirect('books/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        unlink(public_path() . $book->photo->path);
        Photo::findOrfail($book->photo->id)->delete();
        ImageBook::where('book_id', $book->id)->delete();
        Session::flash('book_change', 'The book has been successfully deleted!');
        $book->delete();
        return redirect('books');
    }
}
