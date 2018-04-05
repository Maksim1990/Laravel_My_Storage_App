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
    <div class="col-sm-2 col-lg-2">
        @include('books.left')
    </div>
    <div class="col-sm-8 col-sm-offset-1 col-lg-8 col-lg-offset-1" style="padding-top: 30px;">
        <div class="col-sm-12 col-xs-12" style="margin-bottom: 100px;">
            <div class="col-sm-5 col-xs-12">
                <div class="w3-center">
                @if(!empty($book->photo_id) && !empty($book->photo_path))
                    <img height="150" style="border-radius: 20px;"
                         src="{{$book->photo_path }}"
                         class="image-responsive" alt="">
                @else
                    <div style='border-radius: 20px;'>
                        <p  id='add_image' class='w3-hover-opacity' style="height:200px;background-repeat: no-repeat;background-size: 250px 250px;background-image:url('{{"/images/includes/noImage.jpg"}}')">
                            @if($book->user_id==Auth::id() || Auth::user()->role_id=='1')
                                <a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/books/'.$book->id."/edit/image")}}" style='height:100%;text-decoration:none;'>
                                    <i id='add_image_icon' style='position:relative;top:100px;display:none;font-size:30px;color:gray;' class=" fa fa-plus-circle" aria-hidden="true"></i></a>
                            @endif
                        </p>
                    </div>
                @endif
            </div>
            </div>
            <div class="col-sm-6 col-xs-12" id="book_details">
                <p>@lang_u('messages.book') ID: {{$book->id}}</p>
                <p>@lang_u('messages.title'): {{$book->title}}</p>
                <p>@lang_u('messages.author') {{$book->author}}</p>
            </div>
            <div class="col-sm-1 col-xs-12" id="like_block">
                @if($blnLike)
                    @php $strClass="fas";$strStatus="dislike";$txtTooltip='Remove from favorite';  @endphp
                @else
                    @php $strClass="far";$strStatus="like";$txtTooltip='Add to favorite'; @endphp
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
                                    <img style="border-radius: 30px;" width="160" height="160" id="image_img_{{$item->photo->id}}"
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
                <button class="btn btn-success" disabled="true" id="add_comment">@lang_u('messages.add')</button>
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
            var confDelete = confirm('Do you want to delete this description?');
            if (confDelete) {
                $.ajax({
                    method: 'POST',
                    url: url,
                    data: {
                        image_id: image_id,
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
                                text: 'Image was successfully deleted!'
                            }).show();
                        }

                    }
                });
            }

        });


        $('#ratingSelect').barrating('show', {
            theme: 'bootstrap-stars',
            onSelect: function (value, text) {

                var urlRating = '{{ URL::to('register_rating_ajax') }}';
                var current_rating = $('#current_number').html();
                var item_number = '{{$book->id}}';
                $('#current_number').html(+current_rating + +value);
                $('#ratingSelect').toggleClass('invisible');
                $.ajax({
                    method: 'POST',
                    url: urlRating,
                    dataType: "json",
                    data: {
                        rating_value: value,
                        item_number: item_number,
                        _token: token
                    },
                    async: true,
                    success: function (data) {
                        if (data['status']) {

                            $('#ratingSelect').barrating('destroy');
                            $('#rating_message').css('display', 'block');

                            var intRating = $('#voteCount').html();
                            $('#voteCount').html(+intRating + 1);
                            new Noty({
                                type: 'success',
                                layout: 'topRight',
                                text: 'Successfully rated as ' + value
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
                                text: 'Your comment was removed!'
                            }).show();

                        }
                    }
                });
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
                            var strInfo = 'Added to favorite';
                            var strInfoAjax = 'Remove from favorite';
                            var textStatus = 'dislike';
                            var textClassAdd = 'fas';
                        } else {
                            var strInfo = 'Removed from favorite';
                            var strInfoAjax = 'Add to favorite';
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
        $(document).ready(function(){
            $("#add_image").hover(function(){
                    $("#add_image_icon").css('display','inline');
                },function(){
                    $("#add_image_icon").css('display','none');
                }
            );
        });
    </script>
@endsection