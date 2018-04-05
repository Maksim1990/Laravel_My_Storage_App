<?php

namespace App\Http\Controllers;

use App\Book;
use App\Item;
use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Excel;

class MaatwebsiteDemoController extends Controller
{
    public function importBooksMain()
    {
        return view('import.importExport');
    }

    public function importMoviesMain()
    {
        return view('import.importExport_movies');
    }

    public function downloadBooks($type)
    {
//-- To get specific items from DB
//        $data = Item::where('id','>', 1)->orderBy('id', 'desc')->get();
//        foreach ($data as $key => $value) {
//            var_dump($value->title);
//        }

        $data = Book::get()->toArray();
        return \Excel::create('export_books', function ($excel) use ($data) {
            $excel->sheet('mySheet', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function downloadMovies($type)
    {
//-- To get specific items from DB
//        $data = Item::where('id','>', 1)->orderBy('id', 'desc')->get();
//        foreach ($data as $key => $value) {
//            var_dump($value->title);
//        }

        $data = Movie::get()->toArray();
        return \Excel::create('export_movies', function ($excel) use ($data) {
            $excel->sheet('mySheet', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }


    public function importBooks()
    {
        if (Input::hasFile('import_file')) {
            $path = Input::file('import_file')->getRealPath();
            $arrError = array();
            $intImported = 0;
            $data = \Excel::load($path, function ($reader) {
            })->get();
            if (!empty($data) && $data->count()) {

                foreach ($data as $key => $value) {
                    if (!empty($value->title) && !empty($value->author) && !empty($value->finished_reading_date)) {
                        $input['title'] = $value->title;
                        $input['author'] = $value->author;
                        $input['date'] = $value->finished_reading_date;
                        $input['description'] = !empty($value->description)?$value->description:"none";
                        $input['publish_year'] = !empty($value->publish_year)?$value->publish_year:"";
                        $input['user_id'] = Auth::id();
                        $input['category_id'] = 18;
                        $input['active'] = 1;
                        $intImported++;
                    } else {
                        $arrError[$value->id] = "Fields 'author' ,'title' and 'date' for line " . $value->id . " shouldn't be empty";
                    }
                }

                if(!empty($input)){
                    Book::create($input);
                    // dd('Insert Record successfully.');
                }
            }
        }

//        //-- Update Algolia index after successful import
//        Book::where('id', '>', 0)->searchable();

        $title = "Import result";
        return view('import.importBooksResult', compact('title', 'arrError', 'intImported'));
    }

    public function importMovies()
    {
        if (Input::hasFile('import_file')) {
            $path = Input::file('import_file')->getRealPath();
            $arrError = array();
            $intImported = 0;
            $data = \Excel::load($path, function ($reader) {
            })->get();
            if (!empty($data) && $data->count()) {

                foreach ($data as $key => $value) {
                    if (!empty($value->title) && !empty($value->author)) {
                        $input['title'] = $value->title;
                        $input['author'] = $value->author;
                        $input['finished_date'] = $value->finished_date;
                        $input['description'] = !empty($value->description)?$value->description:"none";
                        $input['movie_created_year'] = !empty($value->movie_created_year)?$value->movie_created_year:"";
                        $input['user_id'] = Auth::id();
                        $input['category_id'] = 18;
                        $input['active'] = 1;
                        $intImported++;
                    } else {
                        $arrError[$value->id] = "Fields 'author' and 'title' for line " . $value->id . " shouldn't be empty";
                    }
                }

                if(!empty($input)){
                    Movie::create($input);
                    // dd('Insert Record successfully.');
                }
            }
        }

//        //-- Update Algolia index after successful import
//        Book::where('id', '>', 0)->searchable();

        $title = "Import result";
        return view('import.importBooksResult', compact('title', 'arrError', 'intImported'));
    }




}