@extends('layouts.admin')
@section('styles')
    <style>
        .search_main {
            padding-top: 100px;
        }

        #search_header {
            margin-bottom: 50px;
        }

        .search_block {
            border-radius: 20px;
            background-color: lightgreen;
            padding: 0px 10px 0px 10px;
            margin-bottom: 30px;
        }

        .search_block:hover {
            background-color: darkseagreen;
        }

        .search_block a {
            display: block;
            height: 200px;
            width: 100%;
            padding-top: 60px;
        }



    </style>

@endsection
@section('content')

    <div class="col-sm-10 col-sm-offset-1 col-lg-10 col-lg-offset-1 w3-center search_main">
        <div class="col-sm-12 " id="search_header">
            <h1 class="text-uppercase">
                Import/Export
            </h1>
        </div>

        <div class="col-sm-4 col-sm-offset-1 search_block users">
            <a href="{{URL::to(LaravelLocalization::getCurrentLocale() .'/import_books_main')}}" class="text-uppercase">
                <i class="fas fa-search"></i><br>
                @lang('messages.books')
            </a>

        </div>
        <div class="col-sm-4 col-sm-offset-1 search_block books">
            <a href="{{URL::to(LaravelLocalization::getCurrentLocale() .'/import_movies_main')}}" class="text-uppercase">
                <i class="fas fa-search"></i><br>
                @lang('messages.movies')
            </a>
        </div>
    </div>


@endsection
@section('scripts')
    <script src="{{asset('js/app.js')}}"></script>
@endsection