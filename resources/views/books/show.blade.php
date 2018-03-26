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
            padding: 5px 5px;
            margin-bottom: 10px;
        }

        .commentItem:hover {
            background-color: blanchedalmond;
        }

        #input_comment {
            width: 80%;
            display: inline-block;
        }
    </style>
@endsection
@section('content')
    <div class="col-sm-2 col-lg-2">
        <div class="w3-center ">
            <p><a href="{{URL::to('upload_images/'.$book->id.'/1')}}">Upload multiple image</a></p>
            <p><a href="#">Upload single image</a></p>
            <p><a href="{{URL::to('books/'.$book->id."/edit")}}">Edit this book</a></p>
            <p>
                {{ Form::open(['method' =>'DELETE' , 'action' => ['BookController@destroy',$book->id]])}}

                {!! Form::submit('Delete book',['class'=>'btn btn-danger']) !!}

                {!! Form::close() !!}
            </p>
        </div>


        <div id="rating_block" class="col-sm-12">
            <div id="cirrentRating" class="w3-center">
                <span id="current_number">{{$currentRating}}</span>
            </div>

            @if($blnAlreadyVoted)
                @php
                    $blnDisplayRateBlock='none';
                    $blnDisplayRateMessage='block';
                @endphp
            @else
                @php
                    $blnDisplayRateBlock='block';
                    $blnDisplayRateMessage='none';
                @endphp
            @endif
            <div id="rating_main" style="display: {{$blnDisplayRateBlock}};" class="w3-center">
                <select id="ratingSelect" name="rating">
                    <option class="vote" value="1">1</option>
                    <option class="vote" value="2">2</option>
                    <option class="vote" value="3">3</option>
                    <option class="vote" value="4">4</option>
                    <option class="vote" value="5">5</option>
                </select>
            </div>

            <div id="rating_message_block" class="w3-center">
                <span id="rating_message" style="display:{{$blnDisplayRateMessage}};" class="w3-text-green">Thank you for voting!</span>
            </div>
            @if(count($ratings)>0)
                <div id="rating_statistics_block">
                    <p id="rating_statistics_message" class="w3-text-green w3-center w3-tiny">
                        <span id="voteCount" class="w3-medium">{{$countRating}}</span> people already voted
                    </p>
                </div>
            @endif

        </div>


    </div>
    <div class="col-sm-8 col-sm-offset-1 col-lg-8 col-lg-offset-1">
        <div>
            <p>{{$book->id}}</p>
            <p>{{$book->title}}</p>
            <p>{{$book->author}}</p>
        </div>

        <div>
            @if($book->photos)
                <div class="bxslider">
                    @foreach($book->photos as $item)
                        @if($item->photo)
                            <a href="#" id="image_{{$item->photo->id}}" data-toggle="modal" data-target="#showImage"
                               title="Show image"
                               class="show_image"
                               data-image-id="{{$item->photo->id}}"
                               data-image-path="{{$item->photo->path}}"
                            >
                                <img style="border-radius: 30px;" width="160" height="160" src="{{$item->photo->path}}"
                                     alt="">
                            </a>
                        @endif
                    @endforeach
                </div>
            @endif

        </div>


        <div class="col-sm-8  col-lg-8">
            <p><input class="w3-input w3-padding-16 w3-border" id="input_comment" type="text"
                      placeholder="Create comment"
                      onkeyup="return activateButton(event)">
                <button class="btn btn-success" disabled="true" id="add_comment">ADD</button>
            </p>

            <div id="commentBlock" class="col-sm-12 col-lg-12">
                @if(count($comments)>0)
                    @foreach($comments as $comment)
                        <div id="commentItem_{{$comment->id}}" class="commentItem col-sm-12 col-lg-12">
                            <div class="col-sm-4 col-lg-4">
                                @if($comment->user)
                                    <a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale() .'/users/'.$comment->user->id)}}">
                                        {{$comment->user->name}}
                                    </a>
                                @endif
                            </div>
                            <div class="col-sm-8 col-lg-8">

                                <p>Added: {{$comment->created_at->diffForHumans()}}</p>
                                <p>{{$comment->comment}}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No available comments</p>
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
        var token = '{{\Illuminate\Support\Facades\Session::token()}}'
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
                            var user_block = "<a href='/{{LaravelLocalization::getCurrentLocale() }}/users/" + user_id + "'>" + user_name + "</a>";
                            var comment_block = "<div class='col-sm-4 col-lg-4'>" + user_block + "</div><div class='col-sm-8 col-lg-8'><p>Added: " + dateTime + "</p><p>" + comment + "</p></div></div>";
                            $("<div id='commentItem_" + comment_id + "' class='commentItem col-sm-12 col-lg-12'>").html(comment_block).prependTo('#commentBlock');
                            $("#input_comment").val("");
                            activateButton();
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
        if(elements.length > 4){
            for (var i in elements) {
                if (elements.hasOwnProperty(i)) {
                    elements[i].style.display= 'none';
                }
            }
        }

    </script>
@endsection