@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-lg-10 col-lg-offset-1">
            <p>All book</p>
            <h1>All job offers</h1>

            <table class="w3-table-all w3-bordered w3-hoverable">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                </tr>
                <tr class="w3-gray">
                    <td><input class="w3-input" id="filter_id" type="text" data-type="id"
                               value="{{$arrFilter['id']?$arrFilter['id']:""}}"></td>
                    <td><input class="w3-input" id="filter_title" type="text" data-type="title"
                               value="{{$arrFilter['title']?$arrFilter['title']:""}}"></td>
                    <td><input class="w3-input" id="filter_author" type="text" data-type="author"
                               value="{{$arrFilter['author']?$arrFilter['author']:""}}"></td>
                </tr>

                @if(count($books)>0)
                    <tbody id="books_block">
                    @foreach($books as $book)
                        <tr>
                            <td>{{$book->id}}</td>
                            <td>{{$book->title}}</td>
                            <td>{{$book->author}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                @endif
            </table>
        </div>
    </div>
    <div class="w3-center" id="pagination">

        @if($arrFilter)
            {!! $books->appends($arrFilter)->links() !!}
        @else
            {!! $books->links() !!}
        @endif
    </div>


@stop
@section('scripts')
    <script>
        @if(Session::has('book_change'))
        new Noty({
            type: 'success',
            layout: 'topRight',
            text: '{{session('book_change')}}'
        }).show();
        @endif
    </script>
    <script>
        $(document).ready(function () {
            var arrFilter = [];
            arrFilter['id'] = "{{$arrFilter['id']?$arrFilter['title']:''}}";
            arrFilter['title'] = "{{$arrFilter['title']?$arrFilter['title']:''}}";
            arrFilter['author'] = "{{$arrFilter['author']?$arrFilter['author']:''}}";;
            var token = '{{\Illuminate\Support\Facades\Session::token()}}';
            $('#filter_id,#filter_title,#filter_author').keyup(function () {
                var url = '{{ URL::to('filter_book_list') }}';
                var strFilterValue = $(this).val();
                var strFilterType = $(this).data('type');
                if (strFilterValue) {
                    arrFilter[strFilterType] = strFilterValue;
                } else {
                    arrFilter[strFilterType] = "";
                }


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
                        $("#books_block").html("");
                        $("#pagination").html("");
                        if (data['data'].length > 0) {
                            for (var i = 0; i < data['data'].length; i++) {


                                var booksList = "<td>" + data['data'][i]['id'] + "</td><td>" + data['data'][i]['title'] + "</td><td>" + data['data'][i]['author'] + "</td>";

                                $('<tr>').html(booksList + "</tr>").appendTo('#books_block');
                            }
                        } else {
                            $("#books_block").html("");
                            $('<tr>').html("Nothing found</tr>").appendTo('#books_block');
                        }


                        // console.log(data['current_page']);
                        // console.log(data['first_page_url']);
                        // console.log(data['from']);
                        // console.log(data['last']);
                        // console.log(data['next_page_url']);
                        // console.log(data['per_page']);
                        // console.log(data['prev_page_url']);
                        // console.log(data['to']);
                        // console.log(data['total']);


                        var strLink = data['first_page_url'];
                        var intPosition = strLink.indexOf("page=");
                        var strPaginateLink = strLink.substr(0, intPosition);


                        var strPagiantionLinks = "";
                        var count = 1;
                        for (var i = +data['from']; i < +data['total']; i = i + data['per_page']) {
                            strPagiantionLinks += "<li><a href='books?page=" + count;

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

                        $(' <ul class="pagination">').html(strPagiantionLinks + "</ul>").appendTo('#pagination');
                    }
                });


            });
        });
    </script>
@endsection