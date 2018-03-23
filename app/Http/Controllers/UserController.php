<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Scriptotek\GoogleBooks\GoogleBooks;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


//        $url="https://openlibrary.org/api/books?bibkeys=ISBN:0385472579,LCCN:62019420,ISBN:3791346199&jscmd=data&format=json";
//        $curl = curl_init();
//        curl_setopt($curl, CURLOPT_URL, $url);
//        curl_setopt($curl, CURLOPT_HEADER, false);
//        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//        curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
//        $response = curl_exec($curl);
//        $status = curl_getinfo($curl);
//        curl_close($curl);
//
//        var_dump($status);
//        var_dump($response);


//        $books = new GoogleBooks(['key' => 'AIzaSyBOpZX9gvZRUjtlzDy-7eIFmw0yz5P1BME']);
//        foreach ($books->bookshelves->byUser('113555231101190020526') as $shelf) {
//            echo "<h2>$shelf->title</h2>\n";
//            echo "<ul>\n";
//            foreach ($shelf->getVolumes() as $vol) {
//                echo "  <li>$vol</li>\n";
//            }
//            echo "</ul>\n";
//        }
//        foreach ($books->volumes->search('weather') as $vol) {
//            echo $vol->title . "\n";
//        }


        $user=Auth::user();
        //$users=User::where('id', '>', '0')->where('id','!=',$user->id)->orderBy('id')->paginate(10);
        $users=User::where('id', '>', '0')->orderBy('id')->paginate(10);
        $arrFilter=array();
        return view('users.index', compact('users','arrFilter'));

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
