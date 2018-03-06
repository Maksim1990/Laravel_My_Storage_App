@extends('layouts.admin')
@section('content')
    <div class="col-sm-10 col-sm-offset-1 col-lg-10 col-lg-offset-1">
        <p>All book</p>
        <h1>All job offers</h1>

        <table class="w3-table-all w3-bordered w3-hoverable">
            <tr>
                <th id="sort_id" data-type="id">ID
                <span id="sort_id_icon"></span>
                </th>
                <th id="sort_title" data-type="title">Title
                    <span id="sort_title_icon"></span>
                </th>
                <th id="sort_author" data-type="author">Author
                    <span id="sort_author_icon"></span>
                </th>
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

            @if(count($books)>0)
                <tbody id="books_block">
                @foreach($books as $book)
                    <tr>
                        <td>{{$book->id}}</td>
                        <td>
                            <a href="{{URL::to('books/'.$book->id)}}" id="edit_book_{{$book->id}}">
                                {{$book->title}}</a>
                        </td>
                        <td>{{$book->author}}</td>

                        <td><a href="{{URL::to('books/'.$book->id.'/edit ')}}" id="edit_book_{{$book->id}}"><i
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
                {!! $books->appends($arrFilter)->links() !!}
            @else
                {!! $books->links() !!}
            @endif
        </div>
    </div>



@stop
@section('scripts')
    <script>
        var token = '{{\Illuminate\Support\Facades\Session::token()}}'
        var url = '{{ URL::to('filter_book_list') }}';
        //-- Initialize array of sorting details
        arrSortDetails=[];
        //-- Initialize array of filters
        arrFilter = [];
        {{--<i class="fas fa-long-arrow-alt-up"></i>--}}
        $('#sort_id,#sort_title,#sort_author').click(function () {
            var strFilterType = $(this).data('type');

            //-- Fill in appropriate value into arrSortDetails array
            switch(strFilterType){
                case "id":
                case "title":
                case "author":
                    if(arrSortDetails[0]===strFilterType){
                        if(arrSortDetails[1]==="up"){
                            arrSortDetails=[];
                            arrSortDetails=[strFilterType,"down"];
                        }else{
                            arrSortDetails=[];
                            arrSortDetails=[strFilterType,"up"];
                        }
                    }else{
                        arrSortDetails=[];
                        arrSortDetails=[strFilterType,"up"];
                    }
                    break;
            }

            //-- Add appropriate sort icon for sorting field
            switch(arrSortDetails[0]) {
                case "id":
                case "title":
                case "author":
                    $("#sort_id_icon,#sort_author_icon,#sort_title_icon").html("");
                    $("#sort_id,#sort_author,#sort_title").css("color","black");
                    if(arrSortDetails[1]==="up"){
                        $("#sort_"+arrSortDetails[0]+"_icon").html("<i class='fas fa-long-arrow-alt-up'></i>");
                    }else{
                        $("#sort_"+arrSortDetails[0]+"_icon").html("<i class='fas fa-long-arrow-alt-down'></i>");
                    }
                    $("#sort_"+arrSortDetails[0]).css("color","red");
                    break;
            }

            //-- Perform Ajax call
            RunAjaxRequest(arrFilter,url,token,arrSortDetails);
        });

    </script>
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

            arrFilter['id'] = "{{$arrFilter['id']?$arrFilter['title']:''}}";
            arrFilter['title'] = "{{$arrFilter['title']?$arrFilter['title']:''}}";
            arrFilter['author'] = "{{$arrFilter['author']?$arrFilter['author']:''}}";

            $('#filter_id,#filter_title,#filter_author').keyup(function () {

                var strFilterValue = $(this).val();
                var strFilterType = $(this).data('type');
                if (strFilterValue) {
                    arrFilter[strFilterType] = strFilterValue;
                } else {
                    arrFilter[strFilterType] = "";
                }

                //-- Perform Ajax call
                RunAjaxRequest(arrFilter,url,token,arrSortDetails);

            });
        });


        //-- Ajax request for filtering and sorting
        function RunAjaxRequest(arrFilter,url,token,arrSortDetails) {
            $.ajax({
                method: 'POST',
                url: url,
                data: {
                    id: arrFilter['id'],
                    title: arrFilter['title'],
                    author: arrFilter['author'],
                    arrSortDetails: JSON.stringify(arrSortDetails),
                    _token: token
                },
                beforeSend: function () {
                    //-- Show loader image
                    $("div#divLoading").addClass('show');
                },
                success: function (data) {
                    $("#books_block").html("");
                    $("#pagination").html("");
                    if (data['data'].length > 0) {
                        for (var i = 0; i < data['data'].length; i++) {

                            var strEditButton="<td><a href='books/" + data['data'][i]['id'] + "/edit ' id='edit_book_" + data['data'][i]['id'] + "'><i class='fas fa-edit'></i></a></td>";
                            var booksList = "<td>" + data['data'][i]['id'] + "</td><td><a href='books/" + data['data'][i]['id'] + "' id='edit_book_" + data['data'][i]['id'] + "'>" + data['data'][i]['title'] + "</a></td><td>" + data['data'][i]['author'] + "</td>"+strEditButton;

                            $('<tr>').html(booksList + "</tr>").appendTo('#books_block');
                        }

                        //-- Remove loader image
                        $("div#divLoading").removeClass('show');
                    } else {
                        $("#books_block").html("");
                        $('<tr>').html("Nothing found</tr>").appendTo('#books_block');
                    }


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

                    if (count > 2) {
                        $(' <ul class="pagination">').html(strPagiantionLinks + "</ul>").appendTo('#pagination');
                    }

                }
            });
        }






    </script>

@endsection