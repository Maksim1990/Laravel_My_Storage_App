<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use App\Http\Requests\MovieCreateRequest;
use App\ImageMovie;
use App\Movie;
use App\Photo;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$idUser=0)
    {
        //\Artisan::call('scout:import', ['model' => App\User::class]);
        $user = Auth::user();
        $filterTitle = $request ? $request['title'] : "";
        $filterId = $request ? $request['id'] : "";
        $filterAuthor = $request ? $request['author'] : "";

        $intQuantity = 10;
        $bookLayout = false;
        $setting = Setting::where('user_id', $user->id)->first();

        if (isset($setting)) {
            if ($setting->movie_list_quantity) {
                $intQuantity = $setting->movie_list_quantity;
            }

            if ($setting->movie_list === 'detail') {
                $bookLayout = true;
            }
        }

        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $arrOptions = [
            'intQuantity' => $intQuantity,
            'filterTitle' => $filterTitle,
            'filterId' => $filterId,
            'filterAuthor' => $filterAuthor,
            'currentPage' => $currentPage
        ];
        //-- Flush 'books' key from redis cache
      //Cache::tags('movies')->flush();
        $books = Cache::tags(['movies'])->get('movies_' . $arrOptions['currentPage'] . '_' . $arrOptions['intQuantity'] . '_' . $idUser);

        if (empty($idUser)) {
            $intUserId = 0;
            $strUserAction = '>';
        } else {
            $intUserId = $idUser;
            $strUserAction = '=';
        }

        $strCache=false;
        if (empty($books)) {
            if (!empty($arrOptions['filterTitle']) || !empty($arrOptions['filterId']) || !empty($arrOptions['filterAuthor'])) {
                if (!empty($filterId)) {
                    $books = Movie::where('user_id', Auth::id())->where('id', $arrOptions['filterId'])->where('title', 'like', '%' . $arrOptions['filterTitle'] . '%')->where('author', 'like', '%' . $arrOptions['filterAuthor'] . '%')->orderBy('id')->paginate($arrOptions['intQuantity']);
                    Cache::tags(['movies'])->put('movies_' . $arrOptions['currentPage'] . '_' . $arrOptions['intQuantity'] . '_' . $idUser, $books, 22 * 60);
                } else {
                    $books = Movie::where('user_id', Auth::id())->where('title', 'like', '%' . $arrOptions['filterTitle'] . '%')->where('author', 'like', '%' . $arrOptions['filterAuthor'] . '%')->orderBy('id')->paginate($arrOptions['intQuantity']);
                    Movie::tags(['movies'])->put('movies_' . $arrOptions['currentPage'] . '_' . $arrOptions['intQuantity'] . '_' . $idUser, $books, 22 * 60);
                }
            } else {
                $books = Movie::where('user_id', $strUserAction, $intUserId)->where('active', '=', '1')->orderBy('id')->paginate($arrOptions['intQuantity']);
                Cache::tags(['movies'])->put('movies_' . $arrOptions['currentPage'] . '_' . $arrOptions['intQuantity'] . '_' . $idUser, $books, 22 * 60);
            }
        } else {
            $strCache=true;
        }

        $title = 'All movies';
        $arrFilter = [
            'id' => $filterId,
            'title' => $filterTitle,
            'author' => $filterAuthor
        ];


        $itemsCount = Movie::where('user_id', $strUserAction, $intUserId)->where('active', '=', '1')->orderBy('id')->get();
        $itemsQuantity = count($itemsCount);


        $arrBooksAll=array();
        $strBooksAll="";
        $booksAll = Movie::where('user_id', $user->id)->get();

        if($booksAll){
            foreach ($booksAll as $bookItem){
                $arrBooksAll[]=$bookItem->id;
            }

        }

        if(count($arrBooksAll)>0){
            $strBooksAll=implode(",",$arrBooksAll);
        }

        return view('movies.index', compact('title', 'books','strCache', 'arrFilter', 'bookLayout', 'intQuantity', 'itemsQuantity', 'idUser','strBooksAll'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add new movie';
        $categories=Category::pluck('name','id')->all();
        return view('movies.create', compact('title','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovieCreateRequest $request)
    {
        $file = $request->file('photo_id');
        $photo_id=0;
        if (!($file->getClientSize() > 2100000)) {
            $input = $request->all();
            $user = Auth::user();
            if ($file = $request->file('photo_id')) {
                $name = time() . "_" . $file->getClientOriginalName();
                $file->move('images', $name);
                $photo=Photo::create(['path' => $name, 'user_id' => $user->id, 'module_id' => 2]);
                $photo_id=$photo->id;
            }
            $input['user_id'] = $user->id;
            $input['category_id'] = 18;
            $movie = Movie::create($input);

            ImageMovie::create(['movie_id' => $movie->id, 'photo_id' => $photo_id]);
            Session::flash('movie_change', 'New movie has been successfully created!');
            //-- Flush 'movies' key from redis cache
            Cache::tags('movies')->flush();
            return redirect('movies/' . $movie->id);
        } else {
            Session::flash('movie_change', 'Image size should not exceed 2 MB');
            return redirect('movies/create');
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
        $movie = Movie::findOrFail($id);

        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        $categories=Category::pluck('name','id')->all();
        //$adds=Advertisement::where('user_id',Auth::id())->pluck('title','id')->all();
        //$types=CommunityType::pluck('name','id')->all();

        $title = 'Edit movie';
        return view('movies.edit', compact('movie', 'title','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MovieCreateRequest $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $user = Auth::user();
        $photo_id=0;
        $file = $request->file('photo_id');
        $input = $request->all();
        if ($file) {
            if (!($file->getClientSize() > 2100000)) {
                $user = Auth::user();
                if ($file = $request->file('photo_id')) {
                    $name = time() . "_" . $file->getClientOriginalName();
                    $file->move('images', $name);
                    $photo = Photo::create(['path' => $name, 'user_id' => $user->id, 'module_id' => 1]);
                    $photo_id=$photo->id;
                }
            } else {
                Session::flash('book_change', 'Image size should not exceed 2 MB');
                return redirect('movies/' . $id . '/edit');
            }
        }
        $input['user_id'] = $user->id;
        $movie->update($input);
        Session::flash('movie_change', 'New movie has been successfully updated!');

        ImageMovie::create(['movie_id' => $movie->id, 'photo_id' => $photo_id]);
        Session::flash('movie_change', 'New movie has been successfully updated!');
        //-- Flush 'movies' key from redis cache
        Cache::tags('movies')->flush();
        return redirect('movies/' . $movie->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        foreach ($movie->photos as $item) {
            unlink(public_path() . $item->photo->path);
            Photo::findOrfail($item->photo->id)->delete();
            ImageMovie::where('photo_id', $item->photo->id)->delete();
            //  var_dump($item->photo->path);
        }
        Session::flash('movie_change', 'The movie has been successfully deleted!');
        //-- Flush 'movies' key from redis cache
        Cache::tags('movies')->flush();
        $movie->delete();


        return redirect('movies');
    }


    public function filterMovieList(Request $request)
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


        //-- Get user's settings from cache or from DB
        $setting = Cache::remember('settings_' . $user->id, 22 * 60, function () use ($user) {
            return Setting::where('user_id', $user->id)->first();
        });

        //-- Flush 'books' key from redis cache
        Cache::forget('settings_' . $user->id);

        if (isset($setting)) {
            $setting->movie_list_quantity = $intQuantity;
            $setting->movie_list = $strLayout;
            $setting->save();
        } else {
            $input['user_id'] = Auth::id();
            $input['movie_list_quantity'] = $intQuantity;
            $input['movie_list'] = $strLayout;
            Setting::create($input);
        }


        //-- Set user setting cache data
        Cache::put('settings_' . $user->id, $setting, 22 * 60);
        //-- Flush 'movies' key from redis cache
        Cache::tags('movies')->flush();


        $idUser=$request['idUser'];
        if(empty($idUser)){
            $intUserId=0;
            $strUserAction='>';
        }else{
            $intUserId=$idUser;
            $strUserAction='=';
        }

        if (!empty($intId)) {
            $items = Movie::where('user_id', $strUserAction,$intUserId)->where('id', $intId)->where('title', 'like', '%' . $strTitle . '%')->where('author', 'like', '%' . $strAuthor . '%')->orderBy($strSortItem, $strSortDirection)->paginate($intQuantity);
        } else {
            $items = Movie::where('user_id', $strUserAction,$intUserId)->where('title', 'like', '%' . $strTitle . '%')->where('author', 'like', '%' . $strAuthor . '%')->orderBy($strSortItem, $strSortDirection)->paginate($intQuantity);
        }

        return $items;
    }


    public function getAllMoviesQuantity(Request $request)
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


        //-- Flush 'movies' key from redis cache
        Cache::tags('movies')->flush();


        $idUser=$request['idUser'];
        if(empty($idUser)){
            $intUserId=0;
            $strUserAction='>';
        }else{
            $intUserId=$idUser;
            $strUserAction='=';
        }

        if (!empty($intId)) {
            $items = Movie::where('user_id', $strUserAction,$intUserId)->where('id', $intId)->where('title', 'like', '%' . $strTitle . '%')->where('author', 'like', '%' . $strAuthor . '%')->orderBy($strSortItem, $strSortDirection)->get();
        } else {
            $items = Movie::where('user_id', $strUserAction,$intUserId)->where('title', 'like', '%' . $strTitle . '%')->where('author', 'like', '%' . $strAuthor . '%')->orderBy($strSortItem, $strSortDirection)->get();
        }

        $intCount = count($items);
        return $intCount;
    }


    public function deleteMultipleMovies(Request $request)
    {
        $blnStatus = true;
        $arrItemsIds = json_decode($request['arrItemsIds']);

        for ($i = 0; $i < count($arrItemsIds); $i++) {

            $book = Movie::findOrFail($arrItemsIds[$i]);
            if (count($book->photos) > 0) {
                foreach ($book->photos as $item) {
                    unlink(public_path() . $item->photo->path);
                    Photo::findOrFail($item->photo->id)->delete();
                    ImageMovie::where('photo_id', $item->photo->id)->delete();
                }
            }

            $book->delete();
        }


        //-- Flush 'books' key from redis cache
        Cache::tags('movies')->flush();

        return ["status" => $blnStatus];
    }



}
