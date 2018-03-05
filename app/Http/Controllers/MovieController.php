<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieCreateRequest;
use App\ImageMovie;
use App\Movie;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MovieController extends Controller
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


        if (!empty($filterTitle) || !empty($filterId) || !empty($filterAuthor)) {

            if (!empty($filterId)) {
                $movies = Movie::where('id', $filterId)->where('title', 'like', '%' . $filterTitle . '%')->where('author', 'like', '%' . $filterAuthor . '%')->orderBy('id')->paginate(10);
            } else {
                $movies = Movie::where('title', 'like', '%' . $filterTitle . '%')->where('author', 'like', '%' . $filterAuthor . '%')->orderBy('id')->paginate(10);
            }
        } else {
            $movies = Movie::where('active', '=', '1')->orderBy('id')->paginate(10);
        }



        $title = 'All movies';
        $arrFilter = [
            'id' => $filterId,
            'title' => $filterTitle,
            'author' => $filterAuthor
        ];
        return view('movies.index', compact('title', 'movies', 'arrFilter'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add new movie';
        return view('movies.create', compact('title'));
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

            $movie = Movie::create($input);

            ImageMovie::create(['movie_id' => $movie->id, 'photo_id' => $photo_id]);
            Session::flash('movie_change', 'New movie has been successfully created!');
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
        //$adds=Advertisement::where('user_id',Auth::id())->pluck('title','id')->all();
        //$types=CommunityType::pluck('name','id')->all();

        $title = 'Edit movie';
        return view('movies.edit', compact('movie', 'title'));
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
        if ($file) {
            if (!($file->getClientSize() > 2100000)) {
                $input = $request->all();
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
        $movie->delete();


        return redirect('movies');
    }


    public function filterMovieList(Request $request)
    {
        $intId = $request['id'];
        $strTitle = !empty($request['title']) ? $request['title'] : "";
        $strAuthor = !empty($request['author']) ? $request['author'] : "";
        if (!empty($intId)) {
            $movies = Movie::where('id', $intId)->where('title', 'like', '%' . $strTitle . '%')->where('author', 'like', '%' . $strAuthor . '%')->orderBy('id')->paginate(10);
        } else {
            $movies = Movie::where('title', 'like', '%' . $strTitle . '%')->where('author', 'like', '%' . $strAuthor . '%')->orderBy('id')->paginate(10);
        }



//        $arr=[
//            'intId'=>$intId,
//            'strTitle'=>$strTitle,
//            'strAuthor'=>$strAuthor
//        ];
//        return $arr;

        return $movies;
    }

}
