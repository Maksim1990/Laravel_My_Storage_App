@extends('layouts.admin')
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
                    <a href="#" data-toggle="modal" data-target="#showImage"
                       title="Show image"
                       class="show_image"
                       data-image-id="{{$item->photo->id}}"
                       data-image-path="{{$item->photo->path}}"
                    >
                    <img style="border-radius: 30px;" width="160" height="160" src="{{$item->photo->path}}" alt="">
                    </a>
                @endforeach
            @endif

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
                        <img id="modal_image_show"  src="" alt="">
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

        $(".show_image").click(function () {

            var image_id = $(this).data('image-id');
            var image_path = $(this).data('image-path');

            $('#modal_image_show_id').val(image_id);
            $('#modal_image_show').attr("src", image_path);
           // $('#myModal').modal('toggle');
        });

        @if(Session::has('book_change'))
        new Noty({
            type: 'success',
            layout: 'topRight',
            text: '{{session('book_change')}}'
        }).show();
        @endif
    </script>
@endsection