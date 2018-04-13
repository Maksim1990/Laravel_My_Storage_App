@extends('layouts.admin')
@section ('scripts_header')
    <script src="http://d3js.org/d3.v3.min.js"></script>
    <script src="{{asset('js/gradientPie.js')}}" type="text/javascript"></script>
@endsection
@section('styles')

@endsection
@section('content')
    <div class="w3-center col-sm-12  col-lg-10 col-lg-offset-1 col-xs-12" style="padding-top: 50px;">
        <div class="w3-center col-sm-12  col-lg-12 col-xs-12 alert alert-danger">
            <div class="w3-center col-sm-12  col-lg-6 col-xs-12 ">
                <div id="stats_book"></div>
            </div>
            <div class="w3-center col-sm-12  col-lg-6 col-xs-12 ">
                <div class="w3-center col-sm-12  col-lg-12 col-xs-12 alert alert-info"
                     style="padding-top: 50px; margin-top:60px;">
                    <h3 class="text-uppercase">@lang('messages.book_statistics')</h3>
                    <div id="books_stats_block"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="w3-center col-sm-12  col-lg-10 col-lg-offset-1 col-xs-12 " style="padding-top: 50px;">
        <div class="w3-center col-sm-12  col-lg-12 col-xs-12 alert alert-danger">


            <div class="w3-center col-sm-12  col-lg-6 col-xs-12 ">
                <div id="stats_movies"></div>
            </div>
            <div class="w3-center col-sm-12  col-lg-6 col-xs-12 ">
                <div class="w3-center col-sm-12  col-lg-12 col-xs-12 alert alert-info"
                     style="padding-top: 50px;margin-top:60px;">
                    <h3 class="text-uppercase">@lang('messages.movie_statistics')</h3>
                    <div id="movies_stats_block"></div>
                </div>
            </div>
        </div>
    </div>


@stop
@section('scripts')
    <script>
        @if(count($users)>0)
        //-- Generate object of books
        var arrBooks = [
                @foreach($users as $user)
            {
                label: "{{$user->name}}", color: getRandomColor(), value: "{{count($user->books)}}", id: '{{$user->id}}'
            },
            @endforeach
        ];

        //-- Generate object of movies
        var arrMovies = [
                @foreach($users as $user)
            {
                label: "{{$user->name}}",
                color: getRandomColor(),
                value: "{{count($user->movies)}}",
                id: '{{$user->id}}'
            },
            @endforeach
        ];

        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
        var svg = d3.select("#stats_book").append("svg").attr("width", 700).attr("height", 400);
        var svg_movies = d3.select("#stats_movies").append("svg").attr("width", 700).attr("height", 400);

        svg.append("g").attr("id", "books");
        svg_movies.append("g").attr("id", "movies");

        gradPie.draw("books", randomData(arrBooks, 'books'), 200, 200, 160);
        gradPie.draw("movies", randomData(arrMovies, 'movies'), 200, 200, 160);


        function randomData(obj, type) {
            var count = 0;
            return obj.map(function (d) {

                var square = "<i class='fas fa-square' style='color:" + arrBooks[count].color + "'></i>";
                if (type === 'books') {
                    var strLink = " <a href='{{URL::to(LaravelLocalization::getCurrentLocale() .'/books/list/')}}/" + d.id + "'>";
                    $('<p style="text-align: left;">').html(square + " " + strLink + d.label + " {{trans('messages.has')}} " + d.value + " {{trans('messages.book_int')}}</a></p>").appendTo('#books_stats_block');
                } else if (type === 'movies') {
                    var strLink = " <a href='{{URL::to(LaravelLocalization::getCurrentLocale() .'/movies/list/')}}/" + d.id + "'>";
                    $('<p style="text-align: left;">').html(square + " " + strLink + d.label + " {{trans('messages.has')}} " + d.value + " {{trans('messages.movie_int')}}</a></p>").appendTo('#movies_stats_block');
                }
                count++;
                return {label: d.label, value: d.value, color: d.color};
            });
        }
        @endif

    </script>
@endsection