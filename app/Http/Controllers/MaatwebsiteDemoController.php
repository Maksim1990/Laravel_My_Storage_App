<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
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

        $data = Item::get()->toArray();
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
                    $insert[] = ['title' => $value->title, 'author' => $value->author,'date' => $value->date];
                }
                if(!empty($insert)){
                    DB::table('items')->insert($insert);
                    dd('Insert Record successfully.');
                }
            }
        }
        return back();
    }
}