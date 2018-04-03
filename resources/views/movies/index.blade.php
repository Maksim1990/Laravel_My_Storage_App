@extends('layouts.admin')
@section('styles')
    <style>
        .btn {
            background: gray;
            margin-bottom: 3px;
        }

        .btn-selected {
            background: lightgray;
            border-color: red;
            border-width: 3px;
        }

        .selectedQuantity {
            color: red;
        }

        #items_found {
            margin-top: 5px;
            font-size: 20px;
            color: green;
        }
    </style>
@endsection
@section('content')
    <div class="col-sm-10 col-sm-offset-1 col-lg-10 col-lg-offset-1">

        <h1>@lang_u('messages.all') @lang('messages.movies')</h1>
        <div class=" w3-left" id="items_found">
            <p>@lang_u('messages.items_found'): <span id="items_found_span">{{$itemsQuantity}}</span></p>
        </div>
        <div class=" w3-right">
            <div id="actions_block"
                 style="display: none;float: left;font-size: 20px;margin-right: 30px;margin-top: 5px;">
                <a href="#" class="w3-text-red" id="delete_multiple">@lang_u('messages.delete') @lang('messages.all')
                    <span id="actions_block_number"></span>
                    @lang('messages.selected') @lang('messages.movies')?</a>
                <a href="#" id="uncheck_all">@lang('messages.uncheck_all')</a>
            </div>


            <div class="numbers_block " style="float: left;margin-right: 30px;margin-top: 5px;font-size: 20px;">
                @php
                    $arrQuantities=array(10,20,50);
                @endphp
                @foreach($arrQuantities as $item)
                    @if($item==$intQuantity)
                        <span><a href="#" id="quantity_{{$item}}" class="quantity selectedQuantity"
                                 data-quantity="{{$item}}">{{$item}}</a></span>
                    @else
                        <span><a href="#" id="quantity_{{$item}}" class="quantity"
                                 data-quantity="{{$item}}">{{$item}}</a></span>
                    @endif

                @endforeach


            </div>


            <div class="buttons_block" style="float:right ;">
                @if(!isset($bookLayout) || !$bookLayout)
                    @php
                        $styleDetail="";
                        $styleNormal="btn-selected";
                    @endphp
                @else
                    @php
                        $styleDetail="btn-selected";
                        $styleNormal="";
                    @endphp
                @endif
                <button class="btn layout {{$styleDetail}}" id='layoutDetail' data-layout="detail"><i
                            class="fas fa-th-large"></i></button>
                <button class="btn layout {{$styleNormal}}" id='layoutNormal' data-layout="normal"><i
                            class="fas fa-list"></i></button>
            </div>

        </div>
        <table class="w3-table-all w3-bordered w3-hoverable">
            <tr data-toggle="tooltip" title="@lang('messages.sorting')" data-placement="left">
                @if($idUser>0 && $idUser==Auth::id())
                    <th>
                    </th>
                @endif
                <th id="sort_id" data-type="id">ID
                    <span id="sort_id_icon"></span>
                </th>
                <th id="sort_title" data-type="title">@lang('messages.title')
                    <span id="sort_title_icon"></span>
                </th>
                <th id="sort_author" data-type="author">@lang_u('messages.author')
                    <span id="sort_author_icon"></span>
                </th>
                <th></th>
            </tr>
            <tr class="w3-gray">
                @if($idUser>0 && $idUser==Auth::id())
                    <td><p class="tooltip_custom">
                            <input type="checkbox"  id="select_all_books">
                            <span class="tooltiptext">@lang('messages.select_all_items')</span>
                        </p></td>
                @endif
                <td><input class="w3-input" id="filter_id" type="text" data-type="id"
                           value="{{$arrFilter['id']?$arrFilter['id']:""}}"></td>
                <td><input class="w3-input" id="filter_title" type="text" data-type="title"
                           value="{{$arrFilter['title']?$arrFilter['title']:""}}"></td>
                <td><input class="w3-input" id="filter_author" type="text" data-type="author"
                           value="{{$arrFilter['author']?$arrFilter['author']:""}}"></td>

                <td></td>
            </tr>
            @if(count($books)>0)
                @if(!isset($bookLayout) || !$bookLayout)
                    <tbody id="books_block_full"></tbody>
                    <tbody id="books_block">
                    @foreach($books as $book)
                        <tr id="book_line_{{$book->id}}">
                            @if($idUser>0 && $idUser==Auth::id())
                                <td><input type="checkbox" class="selectBook" id="select_book_{{$book->id}}"
                                           data-id="{{$book->id}}"></td>
                            @endif
                            <td>{{$book->id}}</td>
                            <td>

                                <a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale() .'/books/'.$book->id)}}"
                                   id="edit_book_{{$book->id}}">
                                    {{$book->title}}</a>
                            </td>
                            <td>{{$book->author}}</td>


                            <td>
                                @if($book->user_id==Auth::id())
                                    <a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/movies/'.$book->id.'/edit ')}}"
                                       id="edit_book_{{$book->id}}"><i
                                                class="fas fa-edit"></i></a>
                                @endif
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                @else
                    <tbody id="books_block"></tbody>
                    <tbody id="books_block_full">
                    @foreach($books as $book)
                        <tr id="book_line_full_{{$book->id}}">
                            @if($idUser>0 && $idUser==Auth::id())
                                <td><input type="checkbox" class="selectBook" id="select_book_full_{{$book->id}}"
                                           data-id="{{$book->id}}"></td>
                            @endif
                            @php
                                $countMain=0;
                            @endphp
                            @if(count($book->photos)>0)
                                @foreach($book->photos as $item)

                                    @if($countMain<1)
                                        <td>
                                            <img style="border-radius: 30px;" width="160" height="160"
                                                 src="{{asset($item->photo->path)}}" alt=""></td>
                                        @php
                                            $countMain++;
                                        @endphp
                                    @endif
                                @endforeach
                            @else
                                <td>
                                    <img style="border-radius: 30px;" width="160" height="160"
                                         src="{{asset('images/includes/noImage.jpg')}}" alt=""></td>
                            @endif
                            <td>
                                <p>@lang('messages.title'): {{$book->title}}</p>
                                <p>@lang('messages.author'): {{$book->author}}</p>
                                <p>@lang('messages.category'): {{$book->category_id!=0?$book->category->name:trans('messages.no_category')}}</p>
                                <p>@lang('messages.finished_reading'): {{$book->date}}</p>
                                <p>@lang('messages.published_year'): {{$book->publish_year}}</p>
                                <p>
                                    @php
                                        $count=0;
                                    @endphp
                                    @if($book->photos)
                                        @foreach($book->photos as $item)
                                            @if($count>=1)
                                                @if($item->photo)
                                                    <a href="#" data-toggle="modal" data-target="#showImage"
                                                       title="Show image"
                                                       class="show_image"
                                                       data-image-id="{{$item->photo->id}}"
                                                       data-image-path="{{$item->photo->path}}"
                                                    >
                                                        <img style="border-radius: 10px;" width="50" height="50"
                                                             src="{{$item->photo->path}}" alt="">
                                                    </a>
                                                @endif
                                            @else
                                                @php
                                                    $count++;
                                                @endphp
                                            @endif
                                        @endforeach
                                    @endif
                                </p>
                            </td>
                            <td style="width: 200px;">
                                <p>@lang('messages.description'): <br>{!! str_limit($book->description, 400) !!}</p>
                            </td>
                            <td>
                                @if($book->user_id==Auth::id())
                                    <a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/movies/'.$book->id.'/edit ')}}"
                                       id="edit_book_{{$book->id}}"><i
                                                class="fas fa-edit"></i></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                @endif
            @endif
        </table>
        <div class="row">

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
    @if($strCache)
        <div class="col-sm-10 col-sm-offset-1 col-lg-10 col-lg-offset-1" id="cache_info">
            <div class="alert alert-success" role="alert">
                <strong>ATTENTION</strong> Current content was loade from Redis cache
            </div>
        </div>
    @endif



@stop
@section('scripts')
    <script>
        var token = '{{\Illuminate\Support\Facades\Session::token()}}'
        var url = '{{ URL::to('filter_movie_list') }}';
        var urlGetAllItemsQuantity = '{{ URL::to('get_movie_quantity') }}';
        var urlDeleteMultipleBooks = '{{ URL::to('delete_multiple_movies_ajax') }}';
        //-- Initialize array of sorting details
        arrSortDetails = [];
        //-- Initialize array of filters
        arrFilter = [];

        //-- Initialize filtered items that retirned after applying filters
        arrFilteredItems = [];

        {{--<i class="fas fa-long-arrow-alt-up"></i>--}}
        $('#sort_id,#sort_title,#sort_author').click(function () {
            var strFilterType = $(this).data('type');

            //-- Fill in appropriate value into arrSortDetails array
            switch (strFilterType) {
                case "id":
                case "title":
                case "author":
                    if (arrSortDetails[0] === strFilterType) {
                        if (arrSortDetails[1] === "up") {
                            arrSortDetails = [];
                            arrSortDetails = [strFilterType, "down"];
                        } else {
                            arrSortDetails = [];
                            arrSortDetails = [strFilterType, "up"];
                        }
                    } else {
                        arrSortDetails = [];
                        arrSortDetails = [strFilterType, "up"];
                    }
                    break;
            }

            //-- Add appropriate sort icon for sorting field
            switch (arrSortDetails[0]) {
                case "id":
                case "title":
                case "author":
                    $("#sort_id_icon,#sort_author_icon,#sort_title_icon").html("");
                    $("#sort_id,#sort_author,#sort_title").css("color", "black");
                    if (arrSortDetails[1] === "up") {
                        $("#sort_" + arrSortDetails[0] + "_icon").html("<i class='fas fa-long-arrow-alt-up'></i>");
                    } else {
                        $("#sort_" + arrSortDetails[0] + "_icon").html("<i class='fas fa-long-arrow-alt-down'></i>");
                    }
                    $("#sort_" + arrSortDetails[0]).css("color", "red");
                    break;
            }


            var strLayout = $('.btn-selected').data('layout');
            var intQuantity = $('.selectedQuantity').data('quantity');
            //-- Perform Ajax call
            RunAjaxRequest(arrFilter, url, token, arrSortDetails, intQuantity, strLayout);
        });


        //=======================
        // Change quantity of items per page block
        //=======================
        $('.quantity').click(function () {
            var intQuantity = $(this).data('quantity');
            var strLayout = $('.btn-selected').data('layout');

            $('.quantity').removeClass('selectedQuantity');
            $(this).addClass('selectedQuantity');

            RunAjaxRequest(arrFilter, url, token, arrSortDetails, intQuantity, strLayout);

            new Noty({
                type: 'success',
                layout: 'topRight',
                text: '{{trans('messages.displayed_quantity_set_to')}} ' + intQuantity
            }).show();
        });


        //=======================
        // Change LAYOUT view
        //=======================
        $('.layout').click(function () {
            var strLayout = $(this).data('layout');
            var intQuantity = $('.selectedQuantity').data('quantity');

            $('.layout').removeClass('btn-selected');
            $(this).addClass('btn-selected');

            RunAjaxRequest(arrFilter, url, token, arrSortDetails, intQuantity, strLayout);

            new Noty({
                type: 'success',
                layout: 'topRight',
                text: '{{trans('messages.displayed_list_is_changed')}}!'
            }).show();

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

                var strLayout = $('.btn-selected').data('layout');
                var intQuantity = $('.selectedQuantity').data('quantity');
                //-- Perform Ajax call
                RunAjaxRequest(arrFilter, url, token, arrSortDetails, intQuantity, strLayout);

            });
        });


        //-- Ajax request for filtering and sorting
        function RunAjaxRequest(arrFilter, url, token, arrSortDetails, intQuantity=10, strLayout='normal') {
            var idUser = '{{$idUser}}';
            var onlineUserId = '{{Auth::id()}}';
            $.ajax({
                method: 'POST',
                url: url,
                data: {
                    id: arrFilter['id'],
                    title: arrFilter['title'],
                    author: arrFilter['author'],
                    arrSortDetails: JSON.stringify(arrSortDetails),
                    intQuantity: intQuantity,
                    strLayout: strLayout,
                    idUser: idUser,
                    _token: token
                },
                beforeSend: function () {
                    //-- Show loader image
                    $("div#divLoading").addClass('show');
                },
                success: function (data) {
                    $("#books_block").html("");
                    $("#books_block_full").html("");
                    $("#pagination").html("");

                    arrFilteredItems=[];
                    if (data['data'].length > 0) {

                        for (var i = 0; i < data['data'].length; i++) {
                            {{--@if(!isset($bookLayout) || !$bookLayout)--}}
                                    {{--var blnDetailedLayout = false;--}}
                                    {{--@else--}}
                                    {{--var blnDetailedLayout = true;--}}
                                    {{--@endif--}}
                            if (strLayout == 'normal') {
                                var blnDetailedLayout = false;
                            } else {
                                var blnDetailedLayout = true;
                            }

                            if (!blnDetailedLayout) {
                                var strCheckBox = "";
                                @if($idUser>0 && $idUser==Auth::id())
                                    strCheckBox = "<td><input type='checkbox' class='selectBook' id='select_book_" + data['data'][i]['id'] + "' data-id='" + data['data'][i]['id'] + "'></td>";
                                        @endif
                                var strEditButton="";
                                if(onlineUserId==data['data'][i]['user_id']){
                                    strEditButton = "<td ><a href='/{{LaravelLocalization::getCurrentLocale() }}/movies/" + data['data'][i]['id'] + "/edit ' id='edit_book_" + data['data'][i]['id'] + "'><i class='fas fa-edit'></i></a></td>";
                                }
                                var booksList = strCheckBox + "<td>" + data['data'][i]['id'] + "</td><td><a href='/{{LaravelLocalization::getCurrentLocale() }}/movies/" + data['data'][i]['id'] + "' id='edit_book_" + data['data'][i]['id'] + "'>" + data['data'][i]['title'] + "</a></td><td>" + data['data'][i]['author'] + "</td>" + strEditButton;
                                $("<tr id='book_line_" + data['data'][i]['id'] + "'>").html(booksList + "</tr>").appendTo('#books_block');
                            } else {

                                if (data['data'][i]['photos'][0] && data['data'][i]['photos'][0]['photo']) {
                                    var MainImagePath = data['data'][i]['photos'][0]['photo']['path'];
                                } else {
                                    var MainImagePath = "{{asset('images/includes/noImage.jpg')}}";
                                }
                                var mainImage = "src='" + MainImagePath + "'";

                                var smallImages = "";

                                if (data['data'][i]['photos'].length > 0) {
                                    for (var j = 0; j < data['data'][i]['photos'].length; j++) {
                                        if (j >= 1 && data['data'][i]['photos'][j]['photo']) {
                                            smallImages += "<a href='#' data-toggle='modal' data-target='#showImage' title='Show image' class='show_image'  data-image-id=''  data-image-path=''><img style='border-radius: 10px;' width='50' height='50' src='" + data['data'][i]['photos'][j]['photo']['path'] + "' alt=''></a>"
                                        }
                                    }
                                }

                                //-- Get category of this item
                                if (data['data'][i]['category_id'] !== 0) {
                                    var category = data['data'][i]['category']['name'];

                                } else {
                                    var category = "{{trans('messages.no_category')}}";
                                }
                                var strCheckBox = "";
                                @if($idUser>0 && $idUser==Auth::id())
                                    strCheckBox = "<td><input type='checkbox' class='selectBook' id='select_book_" + data['data'][i]['id'] + "' data-id='" + data['data'][i]['id'] + "'></td>";
                                        @endif
                                var strCategory = "<p>{{trans('messages.category')}}: " + category + "</p>";

                                var strEditButton="";
                                if(onlineUserId==data['data'][i]['user_id']) {
                                    var strEditButton = "<td ><a href='/{{LaravelLocalization::getCurrentLocale() }}/movies/" + data['data'][i]['id'] + "/edit ' id='edit_book_" + data['data'][i]['id'] + "'><i class='fas fa-edit'></i></a></td>";
                                }
                                var strDesciption=data['data'][i]['description'];
                                if(strDesciption.length > 400) strDesciption = strDesciption.substring(0,400)+" ...";
                                var booksList = strCheckBox+"<td><img style='border-radius: 30px;' width='160' height='160' " + mainImage + " alt=''></td><td><p>Title: " + data['data'][i]['title'] + "</p><p>{{trans('messages.author')}}: " + data['data'][i]['author'] + "</p>" + strCategory + "<p>{{trans('messages.finished_reading')}}: " + data['data'][i]['date'] + "</p><p>{{trans('messages.published_year')}}: " + data['data'][i]['publish_year'] + "</p><p>" + smallImages + "</p></td><td style='width: 200px;'> <p>{{trans('messages.description')}}: <br>" + strDesciption + "</p>"+strEditButton+"</td>";
                                $("<tr id='book_line_full_" + data['data'][i]['id'] + "'>").html(booksList + "</tr>").appendTo('#books_block_full');
                            }
                            arrFilteredItems.push(data['data'][i]['id']);
                        }


                        //-- Remove loader image
                        $("div#divLoading").removeClass('show');
                    } else {
                        $("#books_block").html("");
                        $("div#divLoading").removeClass('show');
                        $('<tr>').html("{{trans('messages.nothing_found')}}</tr>").appendTo('#books_block');
                    }

                    //-- Hide Redis cache info
                    $("#cache_info").hide();

                    GetAllFoundQuantityOfItems(arrFilter, urlGetAllItemsQuantity, token, arrSortDetails);

                    var strLink = data['first_page_url'];
                    var intPosition = strLink.indexOf("page=");
                    var strPaginateLink = strLink.substr(0, intPosition);


                    var strPagiantionLinks = "";
                    var count = 1;
                    for (var i = +data['from']; i <= +data['total']; i = i + data['per_page']) {
                        var idUser = '{{$idUser}}';
                        if (idUser != 0) {
                            strPagiantionLinks += "<li><a href='/movies/list/" + idUser + "/?page=" + count;
                        } else {
                            strPagiantionLinks += "<li><a href='/movies/list/?page=" + count;
                        }


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

                    if (count >= 2) {
                        $(' <ul class="pagination">').html(strPagiantionLinks + "</ul>").appendTo('#pagination');
                    }

                    //-- Mark selected items
                    MarkSelectedItems(arrFilteredItems);

                    //-- Functionality to multiple select of books
                    $('.selectBook').on('click', function () {
                        var intBookId = $(this).data('id');
                        //-- Truncate JS session of books IDs for this user
                        sessionStorage.removeItem('objSelectedMoviesIds_' + '{{Auth::id()}}');
                        if ($(this).is(':checked')) {
                            objCheckedBookIds[intBookId] = intBookId;

                        } else {
                            delete objCheckedBookIds[intBookId];
                        }

                        //-- If some items is still selected than display action link
                        if (Object.keys(objCheckedBookIds).length > 0) {
                            $('#actions_block').css('display', 'block');
                            $('#actions_block_number').text(Object.keys(objCheckedBookIds).length);
                        } else {
                            $('#actions_block').css('display', 'none');
                        }


                        //-- Write JS session of books IDs for this user
                        var arrCheckedBookIds = Object.keys(objCheckedBookIds);
                        sessionStorage.setItem('objSelectedMoviesIds_' + '{{Auth::id()}}', arrCheckedBookIds);

                        MarkSelectedItems(arrFilteredItems);
                    });


                    // //-- Delete Selected Items
                    // $('#delete_multiple').on('click', function () {
                    //     DeleteMultipleItems(arrFilteredItems);
                    // });
                }
            });
        }

        function GetAllFoundQuantityOfItems(arrFilter, urlGetAllItemsQuantity, token, arrSortDetails) {
            var idUser = '{{$idUser}}';
            $.ajax({
                method: 'POST',
                url: urlGetAllItemsQuantity,
                data: {
                    id: arrFilter['id'],
                    title: arrFilter['title'],
                    author: arrFilter['author'],
                    idUser: idUser,
                    arrSortDetails: JSON.stringify(arrSortDetails),
                    _token: token
                },
                success: function (data) {
                    if (+data > 0) {
                        $('#items_found').html('<p>' + "@lang_u('messages.items_found')" + ': <span id="items_found_span">' + data + '</span></p>');
                    }
                }
            });
        }


    </script>
    <script>
        //-- Initiate object of selected books IDs
        objCheckedBookIds = {};
        //sessionStorage.removeItem('objSelectedMoviesIds_' + '{{Auth::id()}}');

        //-- Mark selected items
        MarkSelectedItems(false);

        function MarkSelectedItems(arrFiltered) {

            //-- Get all items for specific user
            var strAllitems='{{$strBooksAll}}';
            var arrAllItems=strAllitems.split(",");

            //-- Check if main checkbox was clicked or not
            var blnSelectAll = sessionStorage.getItem('selectAllItems_movies');

            if(blnSelectAll){
                var arrAlreadySelectedBookIds=arrAllItems;
                $('#select_all_books').prop('checked', true);
            }else{
                var arrAlreadySelectedBookIds = ReturnStorageSessionArray(sessionStorage.getItem('objSelectedMoviesIds_' + '{{Auth::id()}}'));
            }


            var intCountItems = arrAlreadySelectedBookIds.length;

            if (arrFiltered.length > 0) {
                //-- Initialize array of currently selected addresses
                var arrTemporary = [];
                for (var i = 0; i < arrAlreadySelectedBookIds.length; i++) {
                    var intIndex = arrFiltered.indexOf(+arrAlreadySelectedBookIds[i]);
                    if (intIndex >= 0) {
                        arrTemporary.push(+arrAlreadySelectedBookIds[i]);
                    }
                }
                var arrAlreadySelectedBookIds = arrTemporary;

            }else if((arrFiltered.constructor === Array) || arrFiltered.length <= 0){
                arrAlreadySelectedBookIds=[];
            }

            if (arrAlreadySelectedBookIds.length > 0) {

                for (var i = 0; i < arrAlreadySelectedBookIds.length; i++) {
                    $('#select_book_' + arrAlreadySelectedBookIds[i]).prop('checked', true);
                    $('#select_book_full_' + arrAlreadySelectedBookIds[i]).prop('checked', true);
                    @if($idUser>0 && $idUser==Auth::id())
                    $('#actions_block').css('display', 'block');
                    @endif
                    if (!arrFiltered) {
                        objCheckedBookIds[arrAlreadySelectedBookIds[i]] = arrAlreadySelectedBookIds[i];
                        $('#actions_block_number').text(arrAlreadySelectedBookIds.length);
                    } else {
                        if (arrFilter['title'] === "" && arrFilter['id'] === "" && arrFilter['author'] === "") {

                            $('#actions_block_number').text(intCountItems);
                        } else {

                            $('#actions_block_number').text(arrAlreadySelectedBookIds.length);
                        }
                    }
                }
            } else {
                $('#actions_block').css('display', 'none');
            }
        }

        //-- Functionality to multiple select of books
        $('.selectBook').on('click', function () {
            var intBookId = $(this).data('id');
            //-- Truncate JS session of books IDs for this user
            sessionStorage.removeItem('objSelectedMoviesIds_' + '{{Auth::id()}}');
            if ($(this).is(':checked')) {
                objCheckedBookIds[intBookId] = intBookId;

            } else {
                delete objCheckedBookIds[intBookId];
            }

            //-- Uncheck main checkbox and remove 'selectAllItems_movies' from storage
            sessionStorage.removeItem('selectAllItems_movies');
            $('#select_all_books').prop('checked', false);

            //-- If some items is still selected than display action link
            if (Object.keys(objCheckedBookIds).length > 0) {
                $('#actions_block').css('display', 'block');
                $('#actions_block_number').text(Object.keys(objCheckedBookIds).length);
            } else {
                $('#actions_block').css('display', 'none');
            }


            //-- Write JS session of books IDs for this user
            var arrCheckedBookIds = Object.keys(objCheckedBookIds);
            sessionStorage.setItem('objSelectedMoviesIds_' + '{{Auth::id()}}', arrCheckedBookIds);
        });


        //-- Delete Selected Items
        $('#delete_multiple').on('click', function () {
            DeleteMultipleItems(arrFilteredItems);
        });

        //-- Unselect all Items
        $('#uncheck_all').on('click', function () {
            UncheckAll();
        });

        //-- Select all Items
        $('#select_all_books').on('click', function () {
            SelectAll();
        });

        function DeleteMultipleItems(arrFiltered) {
            var arrItemsIds = ReturnStorageSessionArray(sessionStorage.getItem('objSelectedMoviesIds_' + '{{Auth::id()}}'));
            if (arrFiltered.length > 0) {
                //-- Initialize array of currently selected addresses
                var arrTemporary = [];
                for (var i = 0; i < arrItemsIds.length; i++) {
                    var intIndex = arrFiltered.indexOf(+arrItemsIds[i]);
                    if (intIndex >= 0) {
                        arrTemporary.push(+arrItemsIds[i]);
                    }
                }
                var arrItemsIds = arrTemporary;

            }

            var blnConfirm = confirm("{{trans('messages.delete_selected_items')}}?");
            if (blnConfirm == true) {
                $.ajax({
                    url: urlDeleteMultipleBooks,
                    type: "post",
                    data: {
                        arrItemsIds: JSON.stringify(arrItemsIds),
                        _token: token
                    },
                    success: function (data) {

                        if (data['status']) {
                            for (var i = 0; i < arrItemsIds.length; i++) {
                                var intitemsNow = $('#items_found_span').text();
                                $('#items_found_span').text(+intitemsNow - 1);
                                $('#book_line_' + arrItemsIds[i]).hide();
                                $('#book_line_full_' + arrItemsIds[i]).hide();
                                $('#actions_block').hide();
                            }

                            //-- Truncate JS session of books IDs for this user
                            sessionStorage.removeItem('objSelectedMoviesIds_' + '{{Auth::id()}}');
                        }
                    }
                });
            }
        }


        //-- Return specific array from JS session storage depending on arrStorage value
        function ReturnStorageSessionArray(arrStorage) {
            var strStorage = (arrStorage) ? arrStorage : null;
            var arrStorageResult = strStorage ? strStorage.split(",") : 0;
            return arrStorageResult;
        }


        //-- Uncheck all selected elements
        function UncheckAll() {
            var blnConfirm = confirm("{{trans('messages.uncheck_all_items')}}?");
            if (blnConfirm == true) {
                //-- Truncate JS session of books IDs for this user
                sessionStorage.removeItem('objSelectedMoviesIds_' + '{{Auth::id()}}');
                sessionStorage.removeItem('selectAllItems_movies');
                $('#actions_block').css('display', 'none');
                $(":input[id^='select_book_']").prop('checked', false);
                $('#select_all_books').prop('checked', false);
            }
        }


        //-- Uncheck all selected elements
        function SelectAll() {

            if ($("#select_all_books").is(':checked')) {
                sessionStorage.setItem('selectAllItems_movies',true);
                //-- Mark selected items
                MarkSelectedItems(false);
            } else {
                UncheckAll();
            }
        }

    </script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection