@extends('layouts.admin')
@section ('scripts_header')
    <script src="{{asset('js/jquery.barrating.js')}}" type="text/javascript"></script>
    <link href="{{asset('css/jquery.bxslider.css')}}" rel="stylesheet">
    @include('books.style')
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-stars.css') }}">
    <style>
        .commentItem {
            background-color: sandybrown;
            border-radius: 20px;
            padding: 10px 5px;
            margin-bottom: 10px;
        }

        .commentItem:hover {
            background-color: blanchedalmond;
        }

        #input_comment {
            width: 80%;
            display: inline-block;
        }

        .bx-wrapper {
            background-color: transparent;
        }

        #book_details, #like_block {
            padding-top: 30px;
        }

        #like_block {
            font-size: 30px;
        }

        .fa-heart {
            border: 2px dashed green;

            padding: 5px 5px;
            border-radius: 30px;
        }

        .fa-heart:hover {
            font-size: 35px;
        }

        .tooltiptext {
            font-size: 15px;
        }
    </style>
@endsection
@section('content')
    <div class="hidden-sm col-lg-2 hidden-xs hidden-md">
        @include('books.left')
    </div>
    <div class="col-sm-8 col-sm-offset-2 col-lg-8 col-lg-offset-2 col-xs-12 col-md-12" style="padding-top: 30px;">
        <div class="col-sm-12 col-xs-12" style="margin-bottom: 100px;">
            <div class="col-sm-5 col-xs-12">
                <div class="w3-center">
                    @if(!empty($book->photo_id) && !empty($book->photo_path))
                        <img height="150" style="border-radius: 20px;"
                             src="{{$book->photo_path }}"
                             class="image-responsive" alt="">
                    @else
                        <div style='border-radius: 20px;'>
                            <p id='add_image' class='w3-hover-opacity'
                               style="height:200px;background-repeat: no-repeat;background-size: 250px 250px;background-image:url('{{"/images/includes/noImage.jpg"}}')">
                                @if($book->user_id==Auth::id() || Auth::user()->role_id=='1')
                                    <a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/books/'.$book->id."/edit/image")}}"
                                       style='height:100%;text-decoration:none;'>
                                        <i id='add_image_icon'
                                           style='position:relative;top:100px;display:none;font-size:30px;color:gray;'
                                           class=" fa fa-plus-circle" aria-hidden="true"></i></a>
                                @endif
                            </p>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-sm-6 col-xs-12" id="book_details">
                <p>@lang('messages.book') ID: {{$book->id}}</p>
                <p>@lang('messages.title'): {{$book->title}}</p>
                <p>@lang('messages.author'): {{$book->author}}</p>
                <p>@lang('messages.added_by'):
                    <a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale() .'/users/'.$book->user->id)}}">
                        {{$book->user->name}}</a></p>
            </div>
            <div class="col-sm-1 col-xs-12" id="like_block">
                @if($blnLike)
                    @php $strClass="fas";$strStatus="dislike";$txtTooltip=Lang::get('messages.add');  @endphp
                @else
                    @php $strClass="far";$strStatus="like";$txtTooltip=Lang::get('messages.add_to_favorite'); @endphp
                @endif
                <div class="tooltip_custom" id="tooltip_custom">
                    <a href="#" class="like" data-status="{{$strStatus}}"><i
                            class=" fa-heart {{$strClass}} w3-text-green"></i></a>
                    <span class="tooltiptext" id="tooltiptext">{{$txtTooltip}}</span>
                </div>

            </div>
        </div>


        <div>
            @if(count($book->photos)>0)
                <div class="col-sm-12 col-xs-12">
                    <div class="bxslider">
                        @foreach($book->photos as $item)
                            @if($item->photo)
                                <a href="#" id="image_{{$item->photo->id}}" data-toggle="modal" data-target="#showImage"
                                   title="Show image"
                                   class="show_image"
                                   data-image-id="{{$item->photo->id}}"
                                   data-image-path="{{$item->photo->path}}"
                                >
                                    <img style="border-radius: 30px;" width="160" height="160"
                                         id="image_img_{{$item->photo->id}}"
                                         src="{{$item->photo->path}}"
                                         alt="">
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            @else

                <div class="col-sm-12 col-xs-12" style="margin-bottom: 80px;">
                    <p class="w3-text-green w3-xlarge">@lang('messages.has_no_images')!</p>
                </div>
            @endif

        </div>


        <div class="col-sm-8  col-lg-8">
            <p><input class="w3-input w3-padding-16 w3-border" id="input_comment" type="text"
                      placeholder="@lang('messages.create_comment')"
                      onkeyup="return activateButton(event)">
                <button class="btn btn-success" disabled="true" id="add_comment">@lang('messages.add')</button>
            </p>

            <div id="commentBlock" class="col-sm-12 col-lg-12">
                @if(count($comments)>0)
                    @foreach($comments as $comment)
                        <div id="commentItem_{{$comment->id}}" class="commentItem col-sm-12 col-lg-12">
                            <div class="col-sm-4 col-lg-4">
                                @if($comment->user)
                                    <a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale() .'/users/'.$comment->user->id)}}">
                                        <p><img style="border-radius: 20px;margin-top: -5px;" height="35"
                                                src="{{$comment->user->profile->photo ? $comment->user->profile->photo->path :"/images/includes/no_user.png"}}"
                                                alt=""></p>
                                        {{$comment->user->name}}
                                    </a>
                                @endif
                            </div>
                            <div class="col-sm-7 col-lg-7">

                                <p>@lang('messages.added'): {{$comment->created_at->diffForHumans()}}</p>
                                <p>{{$comment->comment}}</p>
                            </div>
                            @if($comment->user->id == Auth::id())
                                <div class="col-sm-1 col-lg-1 ">
                                    <a href="#" id="delete_comment_{{$comment->id}}"
                                       class="delete_comment w3-text-white" data-comment="{{$comment->id}}"><i
                                            class="fas fa-trash-alt"></i></a>
                                </div>
                            @endif
                        </div>
                    @endforeach
                @else
                    <p id="no_comments">@lang('messages.no_comments')</p>
                @endif

            </div>
            <div class="w3-center">
                {!! $comments->links() !!}
            </div>


        </div>

    </div>




    <div id="showImage" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    Image
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p class="w3-center">
                        <img id="modal_image_show" src="" alt="">
                    </p>
                    <input type="hidden" id="modal_image_show_id">
                </div>
                <div class="modal-footer">
                    @if($book->user_id==Auth::id())
                        <button type="button" class="btn btn-danger" id="modal_delete_image">Delete</button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal that pops up when you click on "Delete book" -->
    <div id="id05" class="w3-modal" style="z-index:4">
        <div class="w3-modal-content w3-animate-zoom">
            <div class="w3-container w3-padding w3-green">
                <h2 class="text-uppercase text-uppercase">@lang('messages.delete')</h2>
            </div>
            <div class="w3-panel">
                <div class="w3-section">
                    <div class="w3-center">
                        <div id="delete_user_form">
                            @if(Auth::user()->role_id!=4)
                            <div>
                                <p>@lang('messages.delete_selected_item')?</p>
                            </div>
                            <a class="btn btn-success " style="display: inline;padding: 10px 10px;margin-right: 30px;"
                               onclick="document.getElementById('id05').style.display='none'">@lang('messages.cancel') </a>
                            {{ Form::open(['method' =>'DELETE' , 'action' => ['BookController@destroy',$book->id]])}}

                            {!! Form::submit(trans('messages.delete'),['class'=>'btn btn-danger']) !!}

                            {!! Form::close() !!}
                            @else
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{trans('messages.warning')}}</strong> {{trans('messages.on_testing_account')}}
                                </div>
                                <a class="btn btn-success " style="display: inline;padding: 10px 10px;margin-right: 30px;" onclick="document.getElementById('id05').style.display='none'">@lang('messages.cancel') </a>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal that pops up when you click on "Show rating" -->
    <div id="id07" class="w3-modal" style="z-index:4">
        <div class="w3-modal-content w3-animate-zoom">
            <div class="w3-container w3-padding w3-green">
                <h2 class="text-uppercase text-uppercase">
                    <span  id="people_voted_modal_int">{{$countRating}}</span> @lang('messages.people_already_voted')</h2>
            </div>
            <div class="w3-panel">
                <div class="w3-section">
                    <div class="col-sm-12" id="people_voted_modal" style="padding-bottom: 20px;border-bottom: 1px solid darkgray;">
                        @if(count($ratings)>0)
                            @foreach($ratings as $rating)

                                <div class="col-sm-1 w3-center">
                                    <a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale() .'/users/'.$rating->user->id)}}">
                                        <img style="border-radius: 20px;margin-top: -5px;" height="35"
                                             src="{{$rating->user->profile->photo ? $rating->user->profile->photo->path :"/images/includes/no_user.png"}}"
                                             alt=""><br>
                                        {{$rating->user->name}} </a>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="col-sm-12" style="padding-bottom: 20px;padding-top: 20px;">
                        <a class="w3-button w3-green"
                           onclick="document.getElementById('id07').style.display='none'">@lang('messages.cancel') </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('includes.modals_adds')
@stop
@section('scripts')
    <script src="{{asset('js/examples.js')}}" type="text/javascript"></script>
    <script>
        var token = '{{\Illuminate\Support\Facades\Session::token()}}';
        var url = '{{ URL::to('add_comment') }}';

        $(".show_image").click(function () {

            var image_id = $(this).data('image-id');
            var image_path = $(this).data('image-path');

            $('#modal_image_show_id').val(image_id);
            $('#modal_image_show').attr("src", image_path);
            // $('#myModal').modal('toggle');
        });

        function activateButton(evt) {
            var comment = $("#input_comment").val();

            if (comment) {
                $("#add_comment").prop('disabled', false);
            } else {
                $("#add_comment").prop('disabled', true);
            }

        }

        @if(Session::has('book_change'))
        new Noty({
            type: 'success',
            layout: 'topRight',
            text: '{{session('book_change')}}'
        }).show();

        @endif




        $("#add_comment").click(function () {
            var comment = $("#input_comment").val();

            if (comment) {

                var user_id = '{{Auth::id()}}';
                var book_id = '{{$book->id}}';
                $.ajax({
                    method: 'POST',
                    url: url,
                    data: {
                        comment: comment,
                        item_id: book_id,
                        module_id: 1,
                        user_id: user_id,
                        _token: token
                    },
                    success: function (data) {
                        if (data['status']) {
                            var today = new Date();
                            var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
                            var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                            var dateTime = date + ' ' + time;
                            var comment_id = data['comment_id'];
                            var user_name = '{{Auth::user()->name}}';
                            var user_id = '{{Auth::id()}}';
                            var deleteBlock = " <div class='col-sm-1 col-lg-1'><a href='#' id='delete_comment_" + comment_id + "' class='delete_comment w3-text-white' data-comment='" + comment_id + "'><i class='fas fa-trash-alt'></i></a></div>";
                            var user_image_block = "<p><img style='border-radius: 20px;margin-top: -5px;' height='35' src='{{Auth::user()->profile->photo ? Auth::user()->profile->photo->path :'/images/includes/no_user.png'}}' + alt=''></p>";
                            var user_block = "<a href='/{{LaravelLocalization::getCurrentLocale() }}/users/" + user_id + "'>" + user_image_block + user_name + "</a>";
                            var comment_block = "<div class='col-sm-4 col-lg-4'>" + user_block + "</div><div class='col-sm-7 col-lg-7'><p>Added: " + dateTime + "</p><p>" + comment + "</p></div>" + deleteBlock + "</div>";
                            $("<div id='commentItem_" + comment_id + "' class='commentItem col-sm-12 col-lg-12'>").html(comment_block).prependTo('#commentBlock');
                            $("#input_comment").val("");
                            $("#no_comments").hide();
                            activateButton();

                            //-- Add to favorite functionality
                            $(".delete_comment").click(function () {
                                var comment_id = $(this).data('comment');
                                DeleteComment(comment_id)
                            });

                        }
                    }
                });
            }
        });


        $("#modal_delete_image").click(function () {
            var token = '{{\Illuminate\Support\Facades\Session::token()}}';
            var image_id = $('#modal_image_show_id').val();
            var url = '{{ URL::to('delete_image_ajax') }}';
            var module_id = 1;
            var confDelete = confirm('{{trans('messages.want_to_delete_image')}}');
            if (confDelete) {
                @if(Auth::user()->role_id!=4)
                $.ajax({
                    method: 'POST',
                    url: url,
                    data: {
                        image_id: image_id,
                        module_id: module_id,
                        _token: token
                    },
                    success: function (data) {
                        if (data['status']) {

                            $('#showImage').modal('hide');
                            $('#image_' + image_id).hide();
                            $('#image_img_' + image_id).hide();
                            new Noty({
                                type: 'success',
                                layout: 'topRight',
                                text: '{{trans('messages.image_was_deleted')}}'
                            }).show();
                            location.reload();
                        }

                    }
                });
                @else
                $('#showImage').modal('hide');
                $('#image_' + image_id).hide();
                $('#image_img_' + image_id).hide();
                new Noty({
                    type: 'error',
                    layout: 'topRight',
                    text: '{{trans('messages.warning')}} {{trans('messages.on_testing_account')}}'
                }).show();

                @endif
            }

        });


        $('#ratingSelect').barrating('show', {
            theme: 'bootstrap-stars',
            onSelect: function (value, text) {

                var urlRating = '{{ URL::to('register_rating_ajax') }}';
                var current_rating = $('#current_number').html();
                var item_number = '{{$book->id}}';
                var module_number = 1;

                $('#ratingSelect').toggleClass('invisible');
                $.ajax({
                    method: 'POST',
                    url: urlRating,
                    dataType: "json",
                    data: {
                        rating_value: value,
                        module_number: module_number,
                        item_number: item_number,
                        _token: token
                    },
                    async: true,
                    success: function (data) {
                        if (data['status']) {

                            $('#ratingSelect').barrating('destroy');
                            $('#rating_message').css('display', 'block');
                            $('#current_number').html(+current_rating + +value);
                            var intRating = $('#voteCount').html();
                            if (current_rating > 0) {
                                $('#voteCount,#people_voted_modal_int').html(+intRating + 1);
                            } else {
                                var strLink = "<a href='#' onclick=\"document.getElementById('id07').style.display='block'\">\n" +
                                    "                <span id=\"voteCount\" class=\"w3-medium\">1</span> {{trans('messages.people_already_voted')}}\n" +
                                    "                </a>";
                                $('#rating_statistics_message').html(strLink);
                                $('#people_voted_modal_int').html(1);
                            }

                            var strImageLink=" <div class=\"col-sm-1 w3-center\">\n" +
                                "                                    <a href=\"{{URL::to('/'.LaravelLocalization::getCurrentLocale() .'/users/'.Auth::user()->id)}}\">\n" +
                                "                                        <img style=\"border-radius: 20px;margin-top: -5px;\" height=\"35\"\n" +
                                "                                             src=\"{{Auth::user()->profile->photo ? Auth::user()->profile->photo->path :'/images/includes/no_user.png'}}\"\n" +
                                "                                             alt=\"\"><br>\n" +
                                "                                        {{Auth::user()->name}} </a>\n" +
                                "                                </div>";
                            $('#people_voted_modal').append(strImageLink);

                            new Noty({
                                type: 'success',
                                layout: 'topRight',
                                text: '{{trans('messages.successfully_rated_as')}}' + value
                            }).show();

                        }
                    }
                });


            }
        });


        //-- Add to favorite functionality
        $(".delete_comment").click(function () {
            var comment_id = $(this).data('comment');
            DeleteComment(comment_id)
        });

        function DeleteComment(comment_id) {
            var urlDeleteComment = '{{ URL::to('delete_books_comment_ajax') }}';
            var blnConfirm = confirm("{{trans('messages.delete_selected_item')}}?");
            if (blnConfirm == true) {
                @if(Auth::user()->role_id!=4)
                $.ajax({
                    method: 'POST',
                    url: urlDeleteComment,
                    dataType: "json",
                    data: {
                        comment_id: comment_id,
                        _token: token
                    },
                    async: true,
                    success: function (data) {
                        if (data['status']) {

                            $('#commentItem_' + comment_id).hide();
                            new Noty({
                                type: 'success',
                                layout: 'topRight',
                                text: '{{trans('messages.comment_was_removed')}}'
                            }).show();

                        }
                    }
                });
                @else
                $('#commentItem_' + comment_id).hide();
                new Noty({
                    type: 'error',
                    layout: 'topRight',
                    text: '{{trans('messages.warning')}} {{trans('messages.on_testing_account')}}'
                }).show();
                @endif
            }
        }

        //-- Add to favorite functionality
        $(".like").click(function () {
            var urlFavorite = '{{ URL::to('add_book_to_favorite_ajax') }}';
            var strStatus = $(this).data('status');
            var module_id = 1;
            //alert(strStatus);
            var item_number = '{{$book->id}}';
            $.ajax({
                method: 'POST',
                url: urlFavorite,
                dataType: "json",
                data: {
                    strStatus: strStatus,
                    item_number: item_number,
                    module_id: module_id,
                    _token: token
                },
                async: true,
                success: function (data) {
                    if (data['status']) {

                        if (strStatus == 'like') {
                            var strInfo = '{{trans('messages.added_to_favorite')}}';
                            var strInfoAjax = '{{trans('messages.remove_from_favorite_list')}}';
                            var textStatus = 'dislike';
                            var textClassAdd = 'fas';
                        } else {
                            var strInfo = '{{trans('messages.removed_from_favorite_list')}}';
                            var strInfoAjax = '{{trans('messages.add_to_favorite')}}';
                            var textStatus = 'like';
                            var textClassAdd = 'far';
                        }
                        $('#tooltiptext').text(strInfoAjax);
                        $('#tooltip_custom').find('a').data('status', textStatus);
                        $('#tooltip_custom').find('a').html("<i class=' fa-heart " + textClassAdd + " w3-text-green'></i>");
                        new Noty({
                            type: 'success',
                            layout: 'topRight',
                            text: strInfo
                        }).show();

                    }
                }
            });
        });


    </script>
    <script src="{{asset('js/jquery.bxslider.js')}}" type="text/javascript"></script>
    <script>
        $('.bxslider').bxSlider({
            auto: true,
            minSlides: 4,
            maxSlides: 4,
            slideWidth: 468,
            slideMargin: 20
        });


        //-- Hide slider dots in case less than 4 images
        var elements = document.getElementsByClassName('bx-pager-link');
        if (elements.length > 4) {
            for (var i in elements) {
                if (elements.hasOwnProperty(i)) {
                    elements[i].style.display = 'none';
                }
            }
        }

        //-- Change link text color on hover
        $('#user_left p').mouseover(function () {
            $(this).find('a').css('color', 'white');
        }).mouseleave(function () {
            $(this).find('a').css('color', '#4CAF50');
        });

    </script>
    <script>
        $(document).ready(function () {
            $("#add_image").hover(function () {
                    $("#add_image_icon").css('display', 'inline');
                }, function () {
                    $("#add_image_icon").css('display', 'none');
                }
            );
        });
    </script>
@endsection