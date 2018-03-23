@extends('layouts.admin')
@section ('styles')
    <style>

        path.slice {
            stroke-width: 2px;
        }

        polyline {
            opacity: .3;
            stroke: black;
            stroke-width: 2px;
            fill: none;
        }

        svg text.percent {
            fill: white;
            text-anchor: middle;
            font-size: 12px;
        }
    </style>
@endsection
@section ('scripts_header')
    <script src="http://d3js.org/d3.v3.min.js"></script>
    <script src="{{asset('js/Donut3D.js')}}" type="text/javascript"></script>
@endsection
@section ('content')
    <div class="w3-col m8 l8 s12">
        <div class="w3-container">
            <div>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab"
                                                              data-toggle="tab">Books</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Movies</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        @if(count($category->books)>0)
                            <p>
                            <h2>All books from current category</h2>
                            </p>
                            <table class="w3-table w3-striped w3-bordered w3-hoverable">
                                <tr>
                                    <th>Book ID</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                </tr>
                                @foreach($category->books as $book)
                                    <tr>
                                        <td>{{$book->id}}</td>
                                        <td>{{$book->author}}</td>
                                        <td><a href="{{URL::to('books/'.$book->id)}}" id="book_{{$book->id}}">
                                                {{$book->title}}</a></td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            <h4>No books in this category</h4>
                        @endif
                    </div>
                    <div role="tabpanel" class="tab-pane" id="profile">
                        @if(count($category->movies)>0)
                            <p>
                            <h2>All movies from current category</h2>
                            </p>
                            <table class="w3-table w3-striped w3-bordered w3-hoverable">
                                <tr>
                                    <th>Book ID</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                </tr>
                                @foreach($category->movies as $movie)
                                    <tr>
                                        <td>{{$movie->id}}</td>
                                        <td>{{$movie->author}}</td>
                                        <td>
                                            <a href="{{URL::to('movies/'.$movie->id)}}" id="movie_{{$movie->id}}">
                                                {{$movie->title}}</a></td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            <h4>No movies in this category</h4>
                        @endif
                    </div>
                </div>

            </div>


        </div>
    </div>
    <div class="w3-col m4 l4 s12 w3-center">
        @if(count($category->books)>0 || count($category->movies)>0)
            <div id="info"></div>
            <p><span style="color:#109618;"><i class="fas fa-square"></i></span> Books ({{count($category->books)}})</p>
            <p><span style="color:#DC3912;"><i class="fas fa-square"></i></span> Movies ({{count($category->movies)}})
            </p>


            <div class="w3-left">
                <h3>INFO</h3>
                @if(count($category->books)>0 )
                    <div id="last_book">
                        <p> <i class="fas fa-book"></i> Last book was added by
                            {{$lastBook->user->name}} {{$lastBook->created_at?$lastBook->created_at->diffForHumans():""}}
                        </p>
                    </div>
                @endif
                @if(count($category->movies)>0 )
                    <div id="last_movie">
                        <p> <i class="fas fa-video"></i> Last movie was added by
                            {{$lastMovie->user->name}} {{$lastMovie->created_at?$lastMovie->created_at->diffForHumans():""}}
                        </p>
                    </div>
                @endif
            </div>
        @endif
    </div>
@stop

@section ('scripts')
    <script>

        var salesData = [
            {label: "Books", color: "#109618", value: "{{count($category->books)}}"},
            {label: "Movies", color: "#DC3912", value: "{{count($category->movies)}}"}
        ];

        var svg = d3.select("#info").append("svg").attr("width", 700).attr("height", 300);

        svg.append("g").attr("id", "salesDonut");
        svg.append("g").attr("id", "quotesDonut");

        Donut3D.draw("salesDonut", randomData(), 150, 150, 130, 100, 30, 0.4);

        function randomData() {
            return salesData.map(function (d) {
                return {label: d.label, value: d.value, color: d.color};
            });
        }


    </script>
@endsection


