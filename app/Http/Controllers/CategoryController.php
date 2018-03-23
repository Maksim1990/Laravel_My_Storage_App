<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view('categories.index', compact('categories'));
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
        $input=$request->all();
        Category::create($input);
        Session::flash('category_change','The category has been successfully created!');
        return redirect('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category=Category::findOrFail($id);

        $lastBook=Book::where('category_id',$id)->orderBy('id','DESC')->first();
        $lastMovie=Movie::where('category_id',$id)->orderBy('id','DESC')->first();
        return view('categories.show',compact('category','lastBook','lastMovie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::findOrFail($id);


        return view('categories.edit',compact('category'));
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
        $category=Category::findOrFail($id);
        $input=$request->all();
        $category->update($input);
        Session::flash('category_change','The category has been successfully edited!');
        return redirect('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        Session::flash('category_change','The category has been successfully deleted!');
        return redirect('/categories');
    }


    public function showItemsPerUser($id,$userId)
    {
        $category=Category::where('id',$id)->where('user_id',$userId)->get();
        return view('categories.user',compact('category'));
    }


}
