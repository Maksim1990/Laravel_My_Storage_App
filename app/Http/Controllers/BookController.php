<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use App\Comment;
use App\Http\Requests\BookCreateRequest;
use App\ImageBook;
use App\Photo;
use App\Setting;
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

        $user = Auth::user();
        $filterTitle = $request ? $request['title'] : "";
        $filterId = $request ? $request['id'] : "";
        $filterAuthor = $request ? $request['author'] : "";

        $intQuantity = 10;
        $bookLayout = false;
        $setting = Setting::where('user_id', $user->id)->first();

        if (isset($setting)) {
            if ($setting->book_list_quantity) {
                $intQuantity = $setting->book_list_quantity;
            }

            if ($setting->book_list === 'detail') {
                $bookLayout = true;
            }
        }


        if (!empty($filterTitle) || !empty($filterId) || !empty($filterAuthor)) {
            if (!empty($filterId)) {
                $books = Book::where('user_id', Auth::id())->where('id', $filterId)->where('title', 'like', '%' . $filterTitle . '%')->where('author', 'like', '%' . $filterAuthor . '%')->orderBy('id')->paginate($intQuantity);
            } else {
                $books = Book::where('user_id', Auth::id())->where('title', 'like', '%' . $filterTitle . '%')->where('author', 'like', '%' . $filterAuthor . '%')->orderBy('id')->paginate($intQuantity);
            }
        } else {
            $books = Book::where('user_id', Auth::id())->where('active', '=', '1')->orderBy('id')->paginate($intQuantity);
        }


        $title = 'All books';
        $arrFilter = [
            'id' => $filterId,
            'title' => $filterTitle,
            'author' => $filterAuthor
        ];


        $itemsCount = Book::where('user_id', Auth::id())->where('active', '=', '1')->orderBy('id')->get();
        $itemsQuantity=count($itemsCount);

        return view('books.index', compact('title', 'books', 'arrFilter', 'bookLayout', 'intQuantity','itemsQuantity'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::pluck('name','id')->all();
        $title = 'Add new book';
        return view('books.create', compact('title','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\BookCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookCreateRequest $request)
    {
        $file = $request->file('photo_id');
        $photo_id = 0;
        if (!($file->getClientSize() > 2100000)) {
            $input = $request->all();
            $user = Auth::user();
            if ($file = $request->file('photo_id')) {
                $name = time() . "_" . $file->getClientOriginalName();
                $file->move('images', $name);
                $photo = Photo::create(['path' => $name, 'user_id' => $user->id, 'module_id' => 1]);

                $photo_id = $photo->id;
            }

            $input['user_id'] = $user->id;
            $input['photo_id'] = $photo_id;
            $input['active'] = 1;

            $book = Book::create($input);
            Session::flash('book_change', 'New book has been successfully created!');

            ImageBook::create(['book_id' => $book->id, 'photo_id' => $photo_id]);
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
        $comments = Comment::where('module_id',1)->where('item_id',$id)->get();

        return view('books.show', compact('book','comments'));
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
        $categories=Category::pluck('name','id')->all();
        //$adds=Advertisement::where('user_id',Auth::id())->pluck('title','id')->all();
        //$types=CommunityType::pluck('name','id')->all();

        $title = 'Edit book';
        return view('books.edit', compact('book', 'title','categories'));
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
        $photo_id = 0;
        $input = $request->all();
        $file = $request->file('photo_id');
        if ($file) {
            if (!($file->getClientSize() > 2100000)) {

                $user = Auth::user();
                if ($file = $request->file('photo_id')) {
                    $name = time() . "_" . $file->getClientOriginalName();
                    $file->move('images', $name);
                    $photo = Photo::create(['path' => $name, 'user_id' => $user->id, 'module_id' => 1]);
                    $photo_id = $photo->id;
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

        if($photo_id >0){
            ImageBook::create(['book_id' => $book->id, 'photo_id' => $photo_id]);
        }

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
        $arrSortDetails = json_decode($request['arrSortDetails']);
        if (count($arrSortDetails) > 0) {
            switch ($arrSortDetails[0]) {
                case "id":
                    $strSortItem = "id";
                    break;
                case "title":
                    $strSortItem = "title";
                    break;
                case "author":
                    $strSortItem = "author";
                    break;
            }
            $strSortDirection = $arrSortDetails[1] === "up" ? "asc" : "desc";
        } else {
            $strSortItem = "id";
            $strSortDirection = "asc";
        }

        $intId = $request['id'];
        $strTitle = !empty($request['title']) ? $request['title'] : "";
        $strAuthor = !empty($request['author']) ? $request['author'] : "";

        $intQuantity = $request['intQuantity'] ? intval($request['intQuantity']) : 10;
        $strLayout = $request['strLayout'] ? $request['strLayout'] : 'normal';

        $user = Auth::user();
        $setting = Setting::where('user_id', $user->id)->first();
        if (isset($setting)) {
            $setting->book_list_quantity = $intQuantity;
            $setting->book_list = $strLayout;
            $setting->save();
        } else {
            $input['user_id'] = Auth::id();
            $input['book_list_quantity'] = $intQuantity;
            $input['book_list'] = $strLayout;
            Setting::create($input);
        }


        if (!empty($intId)) {
            $books = Book::where('user_id', Auth::id())->where('id', $intId)->where('title', 'like', '%' . $strTitle . '%')->where('author', 'like', '%' . $strAuthor . '%')->orderBy($strSortItem, $strSortDirection)->paginate($intQuantity);
        } else {
            $books = Book::where('user_id', Auth::id())->where('title', 'like', '%' . $strTitle . '%')->where('author', 'like', '%' . $strAuthor . '%')->orderBy($strSortItem, $strSortDirection)->paginate($intQuantity);
        }

        return $books;
    }


    public function getAllBooksQuantity(Request $request)
    {
        $arrSortDetails = json_decode($request['arrSortDetails']);
        if (count($arrSortDetails) > 0) {
            switch ($arrSortDetails[0]) {
                case "id":
                    $strSortItem = "id";
                    break;
                case "title":
                    $strSortItem = "title";
                    break;
                case "author":
                    $strSortItem = "author";
                    break;
            }
            $strSortDirection = $arrSortDetails[1] === "up" ? "asc" : "desc";
        } else {
            $strSortItem = "id";
            $strSortDirection = "asc";
        }

        $intId = $request['id'];
        $strTitle = !empty($request['title']) ? $request['title'] : "";
        $strAuthor = !empty($request['author']) ? $request['author'] : "";


        if (!empty($intId)) {
            $books = Book::where('user_id', Auth::id())->where('id', $intId)->where('title', 'like', '%' . $strTitle . '%')->where('author', 'like', '%' . $strAuthor . '%')->orderBy($strSortItem, $strSortDirection)->get();
        } else {
            $books = Book::where('user_id', Auth::id())->where('title', 'like', '%' . $strTitle . '%')->where('author', 'like', '%' . $strAuthor . '%')->orderBy($strSortItem, $strSortDirection)->get();
        }

        $intCount = count($books);
         return $intCount;
    }


}
