<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use App\Comment;
use App\Favorite;
use App\Http\Requests\BookCreateRequest;
use App\ImageBook;
use App\Photo;
use App\Rating;
use App\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


class BookController extends Controller
{
    //-- Redis cache config option for currect controller
    private $useRedis=false;
    
    
    public function useRedisCache(){
        return $this->useRedis;
    }
    
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request, $idUser = 0)
    {

        //\Artisan::call('scout:import', ['model' => App\User::class]);
        $user = Auth::user();
        $filterTitle = $request ? $request['title'] : "";
        $filterId = $request ? $request['id'] : "";
        $filterAuthor = $request ? $request['author'] : "";
        $filterYear = $request ? $request['year'] : "";

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

        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $arrOptions = [
            'intQuantity' => $intQuantity,
            'filterTitle' => $filterTitle,
            'filterId' => $filterId,
            'filterAuthor' => $filterAuthor,
            'filterYear' => $filterYear,
            'currentPage' => $currentPage
        ];
        //-- Flush 'books' key from redis cache
        //Cache::tags('books')->flush();
        if($this->useRedisCache()){
           $books = Cache::tags(['books'])->get('books_' . $arrOptions['currentPage'] . '_' . $arrOptions['intQuantity'] . '_' . $idUser); 
        }else{
           $books = []; 
        }
        

        if (empty($idUser)) {
            $intUserId = 0;
            $strUserAction = '>';
        } else {
            $intUserId = $idUser;
            $strUserAction = '=';
        }

        $strCache=false;
        if (empty($books)) {
            if (!empty($arrOptions['filterTitle']) || !empty($arrOptions['filterId']) || !empty($arrOptions['filterAuthor'])|| !empty($arrOptions['filterYear'])) {
                if (!empty($filterId)) {
                    $books = Book::where('user_id', Auth::id())->where('id', $arrOptions['filterId'])->where('title', 'like', '%' . $arrOptions['filterTitle'] . '%')->where('author', 'like', '%' . $arrOptions['filterAuthor'] . '%')->where('date', 'like', '%' . $arrOptions['filterYear'] . '%')->orderBy('id')->paginate($arrOptions['intQuantity']);
                    if($this->useRedisCache()){
                    Cache::tags(['books'])->put('books_' . $arrOptions['currentPage'] . '_' . $arrOptions['intQuantity'] . '_' . $idUser, $books, 22 * 60);
                    }
                } else {
                    $books = Book::where('user_id', Auth::id())->where('title', 'like', '%' . $arrOptions['filterTitle'] . '%')->where('author', 'like', '%' . $arrOptions['filterAuthor'] . '%')->where('date', 'like', '%' . $arrOptions['filterYear'] . '%')->orderBy('id')->paginate($arrOptions['intQuantity']);
                   if($this->useRedisCache()){
                    Cache::tags(['books'])->put('books_' . $arrOptions['currentPage'] . '_' . $arrOptions['intQuantity'] . '_' . $idUser, $books, 22 * 60);
                   }
                }
            } else {
                $books = Book::where('user_id', $strUserAction, $intUserId)->where('active', '=', '1')->orderBy('id')->paginate($arrOptions['intQuantity']);
                if($this->useRedisCache()){
                Cache::tags(['books'])->put('books_' . $arrOptions['currentPage'] . '_' . $arrOptions['intQuantity'] . '_' . $idUser, $books, 22 * 60);
                }
            }
        } else {
            $strCache=true;
        }

        $title = ucfirst(trans('messages.all')).' '.trans('messages.books');
        $arrFilter = [
            'id' => $filterId,
            'title' => $filterTitle,
            'author' => $filterAuthor,
            'year' => $filterYear
        ];


        $itemsCount = Book::where('user_id', $strUserAction, $intUserId)->where('active', '=', '1')->orderBy('id')->get();
        $itemsQuantity = count($itemsCount);


        $arrBooksAll=array();
        $strBooksAll="";
        $booksAll = Book::where('user_id', $user->id)->get();

        if($booksAll){
            foreach ($booksAll as $bookItem){
                $arrBooksAll[]=$bookItem->id;
            }

        }

        if(count($arrBooksAll)>0){
            $strBooksAll=implode(",",$arrBooksAll);
        }
        
   
        
        if($idUser>0 ){
            $objUser=User::findOrFail($idUser);
           $strUser= "(".$objUser->name.")";
        }else{
            $strUser="";
        }
        return view('books.index', compact('title', 'books','strCache','arrFilter', 'bookLayout', 'intQuantity', 'itemsQuantity', 'idUser','strUser','strBooksAll'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();
        $title = 'Add new book';
        return view('books.create', compact('title', 'categories'));
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
        $user = Auth::user();
        if (!empty($file) && !($file->getClientSize() > 2100000)) {
            $input = $request->all();

            if ($file = $request->file('photo_id')) {
                $name = time() . "_" . $file->getClientOriginalName();
                $file->move('images', $name);
                $photo = Photo::create(['path' => $name, 'user_id' => $user->id, 'module_id' => 1]);

                $photo_id = $photo->id;
            }

            $input['user_id'] = $user->id;
            $input['photo_id'] = $photo_id;
            $input['category_id'] = 18;
            $input['active'] = 1;

            $book = Book::create($input);
            Session::flash('book_change', trans('messages.new_books_was_created'));

            ImageBook::create(['book_id' => $book->id, 'photo_id' => $photo_id]);
            Session::flash('book_change', trans('messages.new_books_was_created'));
            
            if($this->useRedisCache()){
            //-- Flush 'books' key from redis cache
            Cache::tags('books')->flush();
            }


            //-- Remove TSV books file from this user (later will be re-downloaded again)
            if (file_exists("files/tsv/user_books/user_" . $user->id . ".tsv")) {
                unlink("files/tsv/user_books/user_" . $user->id . ".tsv");
            }

            return redirect('books/' . $book->id);
        } else {
            Session::flash('book_change', trans('messages.image_should_not_exceed'));
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
        $user=Auth::user();
        $comments = Comment::where('module_id', 1)->where('item_id', $id)->orderBy('id', 'DESC')->paginate(10);
        $ratings = Rating::where('module_number', 1)->where('item_number', $id)->get();


        $currentRating = 0;
        $countRating = count($ratings);
        foreach ($ratings as $rating) {
            $currentRating += $rating->rating_value;

            //-- Already voted block
            if ($rating->user_id == Auth::id()) {
                $blnAlreadyVoted = true;
            } else {
                $blnAlreadyVoted = false;
            }

        }

        $module_id=1;
        $favorite=Favorite::where('user_id',$user->id)->where('module_number',$module_id)->where('item_number',$id)->first();
        if(!empty($favorite->id)){
            $blnLike=true;
        }else{
            $blnLike=false;
        }




        return view('books.show', compact('book', 'comments', 'currentRating', 'countRating', 'ratings', 'blnAlreadyVoted','favorite','blnLike'));
    }

    public function testFunction()
    {

//        //-- Update Algolia index after successful import
//        Book::where('id', '>', 0)->searchable();

        return view('test');
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
        $categories = Category::pluck('name', 'id')->all();
        //$adds=Advertisement::where('user_id',Auth::id())->pluck('title','id')->all();
        //$types=CommunityType::pluck('name','id')->all();

        $title = 'Edit book';
        return view('books.edit', compact('book', 'title', 'categories'));
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function editImage($id)
    {
       $book = Book::findOrFail($id);
        $title = "Assign image";
        return view('books.assignImage', compact('book', 'title'));
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
        $locale = LaravelLocalization::getCurrentLocale();
        $user = Auth::user();
        $photo_id = 0;
        $input = $request->all();
        $file = $request->file('photo_id');
        if ($file) {
            if (!($file->getClientSize() > 2100000)) {

                if ($file = $request->file('photo_id')) {
                    $name = time() . "_" . $file->getClientOriginalName();
                    $file->move('images', $name);
                    $photo = Photo::create(['path' => $name, 'user_id' => $user->id, 'module_id' => 1]);
                    $photo_id = $photo->id;
                }
            } else {
                Session::flash('book_change', trans('messages.image_should_not_exceed'));
                return redirect($locale.'/books/' . $id . '/edit');
            }
        }
        $input['user_id'] = $user->id;
        $input['active'] = 1;
        $book->update($input);
        Session::flash('book_change', trans('messages.new_books_was_updated'));
        
        if($this->useRedisCache()){
        //-- Flush 'books' key from redis cache
        Cache::tags('books')->flush();
        }


        //-- Remove TSV books file from this user (later will be re-downloaded again)
        if (file_exists("files/tsv/user_books/user_" . $user->id . ".tsv")) {
            unlink("files/tsv/user_books/user_" . $user->id . ".tsv");
        }


        if ($photo_id > 0) {
            ImageBook::create(['book_id' => $book->id, 'photo_id' => $photo_id]);
        }

        Session::flash('book_change', trans('messages.new_books_was_updated'));
        return redirect("/".$locale.'/books/' . $book->id);

    }




    public function assignImage(Request $request, $id)
    {

        $book = Book::findOrFail($id);
        $locale = LaravelLocalization::getCurrentLocale();
        $user = Auth::user();
        $photo_id = 0;
        $photo_chosen = $request['photo_chosen'];
        $photo_path = '/images/'.$request['photo_path'];
        $file = $request->file('photo_id');
        if ($file) {
            if (!($file->getClientSize() > 2100000)) {

                if ($file = $request->file('photo_id')) {
                    $name = time() . "_" . $file->getClientOriginalName();
                    $file->move('images', $name);
                    $photo = Photo::create(['path' => $name, 'user_id' => $user->id, 'module_id' => 1]);
                    $photo_id = $photo->id;
                    $photo_path = '/images/'.$name;
                    $book->update(['photo_id'=>$photo_id,'photo_path'=>$photo_path]);

                }
            } else {
                Session::flash('book_change', trans('messages.image_should_not_exceed'));
                return redirect($locale.'/books/' . $id . '/edit');
            }
        }else{
            if($photo_chosen>0){
                $photo_id = $photo_chosen;
                $book->update(['photo_id'=>$photo_id,'photo_path'=>$photo_path]);
            }

        }

        Session::flash('book_change', trans('messages.book_image_was_assigned'));
        
        if($this->useRedisCache()){
        //-- Flush 'books' key from redis cache
        Cache::tags('books')->flush();
        }



        if ($photo_id > 0) {
            ImageBook::create(['book_id' => $book->id, 'photo_id' => $photo_id]);
        }

        Session::flash('book_change', trans('messages.new_books_was_updated'));
        return redirect($locale.'/books/' . $book->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $locale = LaravelLocalization::getCurrentLocale();
        $book = Book::findOrFail($id);
        $user = Auth::user();
        foreach ($book->photos as $item) {
            unlink(public_path() . $item->photo->path);
            Photo::findOrfail($item->photo->id)->delete();
            ImageBook::where('photo_id', $item->photo->id)->delete();
        }
        Session::flash('book_change', trans('messages.book_was_deleted'));
        
        if($this->useRedisCache()){
        //-- Flush 'books' key from redis cache
        Cache::tags('books')->flush();
        }

        Comment::where('module_id', 1)->where('item_id', $book->id)->delete();
        Rating::where('module_number', 1)->where('item_number', $book->id)->delete();

        $book->delete();

        //-- Remove TSV books file from this user (later will be re-downloaded again)
        if (file_exists("files/tsv/user_books/user_" . $user->id . ".tsv")) {
            unlink("files/tsv/user_books/user_" . $user->id . ".tsv");
        }


        return redirect($locale . '/books/list');
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
                case "year":
                    $strSortItem = "date";
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
        $strYear = !empty($request['year']) ? $request['year'] : "";

        $intQuantity = $request['intQuantity'] ? intval($request['intQuantity']) : 10;
        $strLayout = $request['strLayout'] ? $request['strLayout'] : 'normal';

        $user = Auth::user();


        if($this->useRedisCache()){
        //-- Get user's settings from cache or from DB
        $setting = Cache::remember('settings_' . $user->id, 22 * 60, function () use ($user) {
            return Setting::where('user_id', $user->id)->first();
        });

        //-- Flush 'books' key from redis cache
        Cache::forget('settings_' . $user->id);
        }

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

        if($this->useRedisCache()){
        //-- Set user setting cache data
        Cache::put('settings_' . $user->id, $setting, 22 * 60);
        //-- Flush 'books' key from redis cache
        Cache::tags('books')->flush();
        }

        $idUser = $request['idUser'];
        if (empty($idUser)) {
            $intUserId = 0;
            $strUserAction = '>';
        } else {
            $intUserId = $idUser;
            $strUserAction = '=';
        }

        if (!empty($intId)) {
            $books = Book::where('user_id', $strUserAction, $intUserId)->where('id', $intId)->where('title', 'like', '%' . $strTitle . '%')->where('author', 'like', '%' . $strAuthor . '%')->where('date', 'like', '%' . $strYear . '%')->orderBy($strSortItem, $strSortDirection)->paginate($intQuantity);
        } else {
            $books = Book::where('user_id', $strUserAction, $intUserId)->where('title', 'like', '%' . $strTitle . '%')->where('author', 'like', '%' . $strAuthor . '%')->where('date', 'like', '%' . $strYear . '%')->orderBy($strSortItem, $strSortDirection)->paginate($intQuantity);
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
                case "year":
                    $strSortItem = "date";
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
        $strYear = !empty($request['year']) ? $request['year'] : "";

        if($this->useRedisCache()){
        //-- Flush 'books' key from redis cache
        Cache::tags('books')->flush();
        }


        $idUser = $request['idUser'];
        if (empty($idUser)) {
            $intUserId = 0;
            $strUserAction = '>';
        } else {
            $intUserId = $idUser;
            $strUserAction = '=';
        }

        if (!empty($intId)) {
            $books = Book::where('user_id', $strUserAction, $intUserId)->where('id', $intId)->where('title', 'like', '%' . $strTitle . '%')->where('author', 'like', '%' . $strAuthor . '%')->where('date', 'like', '%' . $strYear . '%')->orderBy($strSortItem, $strSortDirection)->get();
        } else {
            $books = Book::where('user_id', $strUserAction, $intUserId)->where('title', 'like', '%' . $strTitle . '%')->where('author', 'like', '%' . $strAuthor . '%')->where('date', 'like', '%' . $strYear . '%')->orderBy($strSortItem, $strSortDirection)->get();
        }

        $intCount = count($books);
        return $intCount;
    }



    public function deleteMultipleBooks(Request $request)
    {
        $blnStatus = true;
        $arrItemsIds = json_decode($request['arrItemsIds']);
        $user = Auth::user();

        for ($i = 0; $i < count($arrItemsIds); $i++) {

            $book = Book::findOrFail($arrItemsIds[$i]);
            if (count($book->photos) > 0) {
                foreach ($book->photos as $item) {
                    unlink(public_path() . $item->photo->path);
                    Photo::findOrFail($item->photo->id)->delete();
                    ImageBook::where('photo_id', $item->photo->id)->delete();
                }
            }

            $book->delete();
        }

        //-- Remove TSV books file from this user (later will be re-downloaded again)
        if (file_exists("files/tsv/user_books/user_" . $user->id . ".tsv")) {
            unlink("files/tsv/user_books/user_" . $user->id . ".tsv");
        }
        
        if($this->useRedisCache()){
        //-- Flush 'books' key from redis cache
        Cache::tags('books')->flush();
        }

        return ["status" => $blnStatus];
    }


    public function assignImageAjax(Request $request)
    {
        $blnStatus = true;
        $photo_id = $request['image_id'];
        $photo_path = $request['image_path'];
        $book_id = $request['book_id'];
        $book = Book::findOrFail($book_id);

        $book->update(['photo_id'=>$photo_id,'photo_path'=>$photo_path]);


        return ["status" => $blnStatus];
    }


}
