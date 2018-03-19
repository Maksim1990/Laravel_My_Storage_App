@extends('layouts.admin')
@section('styles')
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
        <p><a href="{{URL::to('upload_images/'.$book->id.'/1')}}">Upload multiple image</a></p>
        <p><a href="#">Upload single image</a></p>
        <p><a href="{{URL::to('books/'.$book->id."/edit")}}">Edit this book</a></p>
        <p>
            {{ Form::open(['method' =>'DELETE' , 'action' => ['BookController@destroy',$book->id]])}}

            {!! Form::submit('Delete book',['class'=>'btn btn-danger']) !!}

            {!! Form::close() !!}
        </p>
    </div>
    <div class="col-sm-8 col-sm-offset-1 col-lg-8 col-lg-offset-1">
        <div>
            <p>{{$book->id}}</p>
            <p>{{$book->title}}</p>
            <p>{{$book->author}}</p>
        </div>

        <div>
            @if($book->photos)
                @foreach($book->photos as $item)
                    @if($item->photo)
                        <a href="#" data-toggle="modal" data-target="#showImage"
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
                                    {{$comment->user->name}}
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
                            var comment_block = "<div class='col-sm-4 col-lg-4'>" + user_name + "</div><div class='col-sm-8 col-lg-8'><p>Added: "+dateTime+"</p><p>" + comment + "</p></div></div>";
                            $("<div id='commentItem_" + comment_id + "' class='commentItem col-sm-12 col-lg-12'>").html(comment_block).appendTo('#commentBlock');
                            $("#input_comment").val("");
                            activateButton();
                        }
                    }
                });
            }
        });


    </script>
@endsection