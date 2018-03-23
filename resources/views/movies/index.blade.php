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
        <h1>All movies</h1>

        <div class=" w3-left" id="items_found">
            <p>Items found: {{$itemsQuantity}}</p>
        </div>
        <div class=" w3-right">
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
                @if(!isset($itemLayout) || !$itemLayout)
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

            @if(count($items)>0)
                @if(!isset($itemLayout) || !$itemLayout)
                    <tbody id="items_block_full"></tbody>
                    <tbody id="items_block">
                    @foreach($items as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>
                                <a href="{{URL::to(LaravelLocalization::getCurrentLocale().'/movies/'.$item->id)}}" id="edit_item_{{$item->id}}">
                                    {{$item->title}}</a>
                            </td>
                            <td>{{$item->author}}</td>

                            <td><a href="{{URL::to(LaravelLocalization::getCurrentLocale().'/movies/'.$item->id.'/edit ')}}" id="edit_item_{{$item->id}}"><i
                                        class="fas fa-edit"></i></a></td>
                        </tr>

                    @endforeach
                    </tbody>
                @else
                    <tbody id="items_block"></tbody>
                    <tbody id="items_block_full">
                    @foreach($items as $item)
                        <tr>
                            @php
                                $countMain=0;
                            @endphp
                            @if(count($item->photos)>0)
                                @foreach($item->photos as $image)

                                    @if($countMain<1 && isset($image->photo))
                                        <td>
                                            <img style="border-radius: 30px;" width="160" height="160"
                                                 src="{{asset($image->photo->path)}}" alt=""></td>
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
                                <p>Title: {{$item->title}}</p>
                                <p>Author: {{$item->author}}</p>
                                <p>Category: {{$item->category_id!=0?$item->category->name:"No category"}}</p>
                                <p>Finished reading: {{$item->date}}</p>
                                <p>Published year: {{$item->publish_year}}</p>
                                <p>
                                    @php
                                        $count=0;
                                    @endphp
                                    @if($item->photos)
                                        @foreach($item->photos as $image)
                                            @if($count>=1)
                                                @if($image->photo)
                                                    <a href="#" data-toggle="modal" data-target="#showImage"
                                                       title="Show image"
                                                       class="show_image"
                                                       data-image-id="{{$image->photo->id}}"
                                                       data-image-path="{{$image->photo->path}}"
                                                    >
                                                        <img style="border-radius: 10px;" width="50" height="50"
                                                             src="{{$image->photo->path}}" alt="">
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
                            <td>
                                <p>Description: <br>{{$item->description}}</p>
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
                {!! $items->appends($arrFilter)->links() !!}
            @else
                {!! $items->links() !!}
            @endif
        </div>
    </div>



@stop
@section('scripts')
    <script>
        var token = '{{\Illuminate\Support\Facades\Session::token()}}'
        var url = '{{ URL::to('filter_movie_list') }}';
        var urlGetAllItemsQuantity = '{{ URL::to('get_movie_quantity') }}';
        //-- Initialize array of sorting details
        arrSortDetails = [];
        //-- Initialize array of filters
        arrFilter = [];
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
                text: 'Displayed quantity of items set to ' + intQuantity
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
                text: 'Displayed list is successfully changed!'
            }).show();

        });

    </script>
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
                    _token: token
                },
                beforeSend: function () {
                    //-- Show loader image
                    $("div#divLoading").addClass('show');
                },
                success: function (data) {
                    $("#items_block").html("");
                    $("#items_block_full").html("");
                    $("#pagination").html("");
                    if (data['data'].length > 0) {
                        for (var i = 0; i < data['data'].length; i++) {
                            if (strLayout == 'normal') {
                                var blnDetailedLayout = false;
                            } else {
                                var blnDetailedLayout = true;
                            }

                            if (!blnDetailedLayout) {
                                var strEditButton = "<td><a href='movies/" + data['data'][i]['id'] + "/edit ' id='edit_item_" + data['data'][i]['id'] + "'><i class='fas fa-edit'></i></a></td>";
                                var itemsList = "<td>" + data['data'][i]['id'] + "</td><td><a href='movies/" + data['data'][i]['id'] + "' id='edit_item_" + data['data'][i]['id'] + "'>" + data['data'][i]['title'] + "</a></td><td>" + data['data'][i]['author'] + "</td>" + strEditButton;
                                $('<tr>').html(itemsList + "</tr>").appendTo('#items_block');
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
                                if (data['data'][i]['category_id']!==0) {
                                    var category=data['data'][i]['category']['name'];

                                }else{
                                    var category="No category";
                                }

                                var strCategory = "<p>Category: "+category+"</p>";

                                var itemsList = "<td><img style='border-radius: 30px;' width='160' height='160' " + mainImage + " alt=''></td><td><p>Title: " + data['data'][i]['title'] + "</p><p>Author: " + data['data'][i]['author'] + "</p>"+strCategory+"<p>Finished reading: " + data['data'][i]['date'] + "</p><p>Published year: " + data['data'][i]['publish_year'] + "</p><p>" + smallImages + "</p></td><td> <p>Description: <br>" + data['data'][i]['description'] + "</p> </td>";
                                $('<tr>').html(itemsList + "</tr>").appendTo('#items_block_full');
                            }
                        }
                        //-- Remove loader image
                        $("div#divLoading").removeClass('show');
                    } else {
                        $("#items_block").html("");
                        $("div#divLoading").removeClass('show');
                        $('<tr>').html("Nothing found</tr>").appendTo('#items_block');
                    }


                    GetAllFoundQuantityOfItems(arrFilter, urlGetAllItemsQuantity, token, arrSortDetails);

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
        }

        function GetAllFoundQuantityOfItems(arrFilter, urlGetAllItemsQuantity, token, arrSortDetails) {
            $.ajax({
                method: 'POST',
                url: urlGetAllItemsQuantity,
                data: {
                    id: arrFilter['id'],
                    title: arrFilter['title'],
                    author: arrFilter['author'],
                    arrSortDetails: JSON.stringify(arrSortDetails),
                    _token: token
                },
                success: function (data) {
                    console.log(data);
                    if (+data > 0) {
                        $('#items_found').html('<p>Items found: ' + data + '</p>');
                    }
                }
            });
        }


    </script>

@endsection