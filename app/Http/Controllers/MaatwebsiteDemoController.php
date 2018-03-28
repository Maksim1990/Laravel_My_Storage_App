<?php

namespace App\Http\Controllers;

use App\Book;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Excel;

class MaatwebsiteDemoController extends Controller
{
    public function importExport()
    {
        return view('import.importExport');
    }
    public function downloadExcel($type)
    {
//-- To get specific items from DB
//        $data = Item::where('id','>', 1)->orderBy('id', 'desc')->get();
//        foreach ($data as $key => $value) {
//            var_dump($value->title);
//        }

        $data = Book::get()->toArray();
        return \Excel::create('itsolutionstuff_example', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }
    public function importExcel()
    {
        if(Input::hasFile('import_file')){
            $path = Input::file('import_file')->getRealPath();
            $data = \Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()){
         
                foreach ($data as $key => $value) {
                    $insert[] = ['title' => $value->title, 'author' => $value->author,'active'=>1,'date' => $value->date,'user_id'=>Auth::id()];
                }
                if(!empty($insert)){
                    Book::create($insert);
                    dd('Insert Record successfully.');
                }
            }
        }

//        //-- Update Algolia index after successful import
//        Book::where('id', '>', 0)->searchable();

        return back();
    }
}