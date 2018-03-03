<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\BookCreateRequest;
use App\ImageBook;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filterTitle = $request ? $request['title'] : "";
        $filterId = $request ? $request['id'] : "";
        $filterAuthor = $request ? $request['author'] : "";
        if ($request) {

            if (!empty($filterId)) {
                $books = Book::where('id', $filterId)->where('title', 'like', '%' . $filterTitle . '%')->where('author', 'like', '%' . $filterAuthor . '%')->orderBy('id')->paginate(10);
            } else {
                $books = Book::where('title', 'like', '%' . $filterTitle . '%')->where('author', 'like', '%' . $filterAuthor . '%')->orderBy('id')->paginate(10);
            }
        } else {
            $books = Book::where('active', '=', '1')->orderBy('id')->paginate(10);
        }


        $title = 'Add new book';
        $arrFilter = [
            'id' => $filterId,
            'title' => $filterTitle,
            'author' => $filterAuthor
        ];
        return view('books.index', compact('title', 'books', 'arrFilter'));
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
                $photo = Photo::create(['path' => $name, 'user_id' => $user->id, 'module_id' => 1]);
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
        $user = Auth::user();

        $file = $request->file('photo_id');
        if ($file) {
            if (!($file->getClientSize() > 2100000)) {
                $input = $request->all();
                $user = Auth::user();
                if ($file = $request->file('photo_id')) {
                    $name = time() . "_" . $file->getClientOriginalName();
                    $file->move('images', $name);
                    $photo = Photo::create(['path' => $name, 'user_id' => $user->id, 'module_id' => 1]);
                    $input['photo_id'] = $photo->id;
                }
            } else {
                Session::flash('book_change', 'Image size should not exceed 2 MB');
                return redirect('books/' . $id . '/edit');
            }
        }
        $input['user_id'] = $user->id;
        $input['active'] = 1;
        $book->update($input);
        Session::flash('book_change', 'New book has been successfully updated!');

        ImageBook::create(['book_id' => $book->id, 'photo_id' => $input['photo_id']]);
        Session::flash('book_change', 'New book has been successfully updated!');
        return redirect('books/' . $book->id);

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
        foreach ($book->photos as $item) {
   unlink(public_path() . $item->photo->path);
            Photo::findOrfail($item->photo->id)->delete();
            ImageBook::where('photo_id', $item->photo->id)->delete();
          //  var_dump($item->photo->path);
        }
        Session::flash('book_change', 'The book has been successfully deleted!');
        $book->delete();


        return redirect('books');
    }


    public function filterBookList(Request $request)
    {
        $intId = $request['id'];
        $strTitle = !empty($request['title']) ? $request['title'] : "";
        $strAuthor = !empty($request['author']) ? $request['author'] : "";
        if (!empty($intId)) {
            $books = Book::where('id', $intId)->where('title', 'like', '%' . $strTitle . '%')->where('author', 'like', '%' . $strAuthor . '%')->orderBy('id')->paginate(10);
        } else {
            $books = Book::where('title', 'like', '%' . $strTitle . '%')->where('author', 'like', '%' . $strAuthor . '%')->orderBy('id')->paginate(10);
        }

        return $books;
    }


}
