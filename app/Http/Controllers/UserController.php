<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\UserCreateRequest;
use App\Photo;
use App\Profile;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Scriptotek\GoogleBooks\GoogleBooks;
use Illuminate\Support\Facades\Session;

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


        $user = Auth::user();
        //$users=User::where('id', '>', '0')->where('id','!=',$user->id)->orderBy('id')->paginate(10);
        $users = User::where('id', '>', '0')->orderBy('id')->paginate(10);
        $arrFilter = array();
        return view('users.index', compact('users', 'arrFilter'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create new user';

        $roles = Role::pluck('name', 'id')->all();
        return view('users.create', compact('title', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        $locale = LaravelLocalization::getCurrentLocale();
        $file = $request->file('photo_id');
        $photo_id = 0;
        $user = Auth::user();
        if (!empty($file) && !($file->getClientSize() > 2100000)) {

            if (trim($request->password) == "") {
                $input = $request->except('password');
            } else {
                $input = $request->all();
            }

            if ($file = $request->file('photo_id')) {
                $name = time() . "_" . $file->getClientOriginalName();
                $file->move('images', $name);
                $photo = Photo::create(['path' => $name, 'user_id' => $user->id, 'module_id' => 3]);

                $photo_id = $photo->id;
            }


            $input['password'] = bcrypt($request->password);
            $user = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => $input['password'],
                'role_id' => $input['role_id'],
                'is_active' => 1

            ]);

            Profile::create([
                'user_id' => $user->id,
                'lastname' => $input['lastname'],
                'country' => $input['country'],
                'city' => $input['city'],
                'status' => $input['status'],
                'user_gender' => $input['user_gender'],
                'photo_id' => $photo_id
            ]);

            Session::flash('user_change', 'The user has been successfully created!');
            return redirect('/' . $locale . '/users');

        } else {
            Session::flash('user_change', 'Image size should not exceed 2 MB');
            return redirect('/' . $locale . '/users/create');
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


        $user = User::findOrFail($id);
        //-- Get all books that user uploaded this year
        $books = Book::where('user_id', $user->id)->whereYear('created_at', date('Y'))->get();

        $arrOfBooks = array();

        $arrMonthNames = [
            "1" => 'January',
            "2" => 'February',
            "3" => 'March',
            "4" => 'April',
            "5" => 'May',
            "6" => 'June',
            "7" => 'July',
            "8" => 'August',
            "9" => 'September',
            "10" => 'October',
            "11" => 'November',
            "12" => 'December'
        ];
        $arrOfMonth = array();

        //-- Filling in array of months
        for ($i = 1; $i <= 12; $i++) {
            $arrOfMonth[$i] = 0;
        }

        //-- Loop through book created date and fill quantity depending on month value
        foreach ($books as $book) {
            $date = $book->created_at;
            $arrDate = explode(" ", $date);
            $arrYMD = explode("-", $arrDate[0]);
            $intMonth = (int)$arrYMD[1];
            if (isset($arrOfBooks[$intMonth])) {
                $arrOfBooks[$intMonth] += 1;
            } else {
                $arrOfBooks[$intMonth] = 1;
            }
        }


        //-- Complete result array with not existing months
        foreach ($arrOfMonth as $key => $val) {
            if (!isset($arrOfBooks[$key])) {
                $arrOfBooks[$key] = $val;
            }
        }


        //-- =================== Check if TSV file exist for current user
        if (!file_exists("files/tsv/user_books/user_" . $user->id . ".tsv")) {

            //-- ============== START of exporting user's books in TSV file
            $fileName = fopen("files/tsv/user_books/user_" . $user->id . ".tsv", "w") or die("Unable to open file!");

            //-- Write tsv file header
            $txt = "letter	frequency\n";
            fwrite($fileName, $txt);
            ksort($arrOfBooks);
            foreach ($arrOfBooks as $key => $val) {
                if ($val < 10) {
                    $val = "0" . $val;
                }
                $txt = "$key\t.$val\n";
                fwrite($fileName, $txt);
            }
            fclose($fileName);
            //-- ============== END of exporting user's books in TSV file
        }

        $title = $user->name . " profile";
        return view('users.show', compact('arrMonthNames', 'user', 'title'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $profile = Profile::where('user_id', $user->id)->get()->first();
        $title = "Edit " . $user->name . " profile";
        return view('users.edit', compact('profile', 'user', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function editProfile($id)
    {
        $user = User::findOrFail($id);
        $profile = Profile::where('user_id', $user->id)->get()->first();
        $title = "Edit " . $user->name . " profile";
        return view('users.editProfile', compact('profile', 'user', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function editPassword($id)
    {
        $user = User::findOrFail($id);
        $profile = Profile::where('user_id', $user->id)->get()->first();
        $title = "Edit " . $user->name . " profile";
        return view('users.editPassword', compact('profile', 'user', 'title'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $locale = LaravelLocalization::getCurrentLocale();
        $profile = Profile::where('user_id', $user->id)->get()->first();

        $input = $request->all();
        $file = $request->file('photo_id');
        if ($file) {
            if (!($file->getClientSize() > 2100000)) {

                if ($file = $request->file('photo_id')) {

                    //-- Delete old image if it exist
                    if ($user->profile->photo_id) {
                        unlink(public_path() . $user->profile->photo->path);
                        $photo_user = Photo::findOrFail($user->profile->photo->id);
                        if ($photo_user) {
                            $photo_user->delete();
                        }
                    }
                    $name = time() . "_" . $file->getClientOriginalName();
                    $file->move('images', $name);
                    $photo = Photo::create(['path' => $name, 'user_id' => $user->id, 'module_id' => 3]);
                    $photo_id = $photo->id;
                }
            } else {
                Session::flash('user_change', 'Image size should not exceed 2 MB');
                return redirect($locale . '/users/' . $id . '/edit');
            }
        }

        $role_id = (isset($input['role_id']) && !empty($input['role_id'])) ? $input['role_id'] : $user->role_id;
        $is_active = (isset($input['is_active']) && !empty($input['is_active'])) ? $input['is_active'] : $user->is_active;

        //-- Update user
        $user->update([
            'name' => $input['name'],
            'email' => $input['email'],
            'role_id' => $role_id,
            'is_active' => $is_active
        ]);

        //-- Update photo ID in profile
        $profile->update([
            'photo_id'=>(!empty($photo_id))?$photo_id:$profile->photo_id
        ]);

        Session::flash('user_change', 'The user has been successfully edited!');
        return redirect($locale . '/users/' . $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
