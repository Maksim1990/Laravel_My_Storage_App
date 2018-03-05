@extends('layouts.admin')
@section('content')
    <div class="col-sm-10 col-sm-offset-1 col-lg-10 col-lg-offset-1">

        <h1>All movies</h1>

        <table class="w3-table-all w3-bordered w3-hoverable">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th></th>
            </tr>
            <tr class="w3-gray">

                <td><input class="w3-input" id="filter_id" type="text" data-type="id"
                           value="{{$arrFilter['id']?$arrFilter['id']:""}}"></td>
                <td><input class="w3-input" id="filter_title" type="text" data-type="title"
                           value="{{$arrFilter['title']?$arrFilter['title']:""}}"></td>
                <td><input class="w3-input" id="filter_author" type="text" data-type="author"
                           value="{{$arrFilter['author']?$arrFilter['author']:""}}"></td>

                <td></td>
            </tr>

            @if(count($movies)>0)
                <tbody id="movies_block">
                @foreach($movies as $movie)
                    <tr>
                        <td>{{$movie->id}}</td>
                        <td>
                            <a href="{{URL::to('movies/'.$movie->id)}}" id="edit_movie_{{$movie->id}}">
                                {{$movie->title}}</a>
                        </td>
                        <td>{{$movie->author}}</td>

                        <td><a href="{{URL::to('movies/'.$movie->id.'/edit ')}}" id="edit_movie_{{$movie->id}}"><i
                                    class="fas fa-edit"></i></a></td>
                    </tr>

                @endforeach
                </tbody>
            @endif
        </table><div class="row">

        </div>
    </div>
    <div class="col-sm-10 col-sm-offset-1 col-lg-10 col-lg-offset-1">
        <div class="w3-center" id="pagination">

            @if($arrFilter)
                {!! $movies->appends($arrFilter)->links() !!}
            @else
                {!! $movies->links() !!}
            @endif
        </div>
    </div>



@stop
@section('scripts')
    <script>
        @if(Session::has('movie_change'))
        new Noty({
            type: 'success',
            layout: 'topRight',
            text: '{{session('movie_change')}}'
        }).show();
        @endif
    </script>
    <script>
        $(document).ready(function () {
            var arrFilter = [];
            arrFilter['id'] = "{{$arrFilter['id']?$arrFilter['title']:''}}";
            arrFilter['title'] = "{{$arrFilter['title']?$arrFilter['title']:''}}";
            arrFilter['author'] = "{{$arrFilter['author']?$arrFilter['author']:''}}";
            ;
            var token = '{{\Illuminate\Support\Facades\Session::token()}}';
            $('#filter_id,#filter_title,#filter_author').keyup(function () {
                var url = '{{ URL::to('filter_movie_list') }}';
                var strFilterValue = $(this).val();
                var strFilterType = $(this).data('type');
                if (strFilterValue) {
                    arrFilter[strFilterType] = strFilterValue;
                } else {
                    arrFilter[strFilterType] = "";
                }

// console.log(arrFilter['id']);
// console.log(arrFilter['title']);
// console.log(arrFilter['author']);
                $.ajax({
                    method: 'POST',
                    url: url,
                    data: {
                        id: arrFilter['id'],
                        title: arrFilter['title'],
                        author: arrFilter['author'],
                        _token: token
                    },
                    success: function (data) {
                        console.log(data);
                        $("#movies_block").html("");
                        $("#pagination").html("");
                        if (data['data'].length > 0) {
                            for (var i = 0; i < data['data'].length; i++) {

                                var strEditButton="<td><a href='movies/" + data['data'][i]['id'] + "/edit ' id='edit_movie_" + data['data'][i]['id'] + "'><i class='fas fa-edit'></i></a></td>";
                                var moviesList = "<td>" + data['data'][i]['id'] + "</td><td><a href='movies/" + data['data'][i]['id'] + "' id='edit_movie_" + data['data'][i]['id'] + "'>" + data['data'][i]['title'] + "</a></td><td>" + data['data'][i]['author'] + "</td>"+strEditButton;

                                $('<tr>').html(moviesList + "</tr>").appendTo('#movies_block');
                            }
                        } else {
                            $("#movies_block").html("");
                            $('<tr>').html("Nothing found</tr>").appendTo('#movies_block');
                        }


                        var strLink = data['first_page_url'];
                        var intPosition = strLink.indexOf("page=");
                        var strPaginateLink = strLink.substr(0, intPosition);


                        var strPagiantionLinks = "";
                        var count = 1;
                        for (var i = +data['from']; i < +data['total']; i = i + data['per_page']) {
                            strPagiantionLinks += "<li><a href='movies?page=" + count;

                            if (arrFilter['id']) {

                                strPagiantionLinks += "&id=" + arrFilter['id'];
                            }
                            if (arrFilter['title']) {
                                strPagiantionLinks += "&title=" + arrFilter['title'];
                            }
                            if (arrFilter['author']) {
                                strPagiantionLinks += "&author=" + arrFilter['author'];
                            }


                            strPagiantionLinks += "'>" + count + "</a></li>";
                            count++;
                        }

                        if (count > 2) {
                            $(' <ul class="pagination">').html(strPagiantionLinks + "</ul>").appendTo('#pagination');
                        }

                    }
                });


            });
        });
    </script>
@endsection