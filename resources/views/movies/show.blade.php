@extends('layouts.admin')
@section('content')
    <div class="col-sm-2 col-lg-2">
        <p><a href="{{URL::to('upload_images/'.$movie->id.'/2')}}">Upload multiple image</a></p>
        <p><a href="#">Upload single image</a></p>
        <p><a href="{{URL::to('movies/'.$movie->id."/edit")}}">Edit this movie</a></p>
        <p>
            {{ Form::open(['method' =>'DELETE' , 'action' => ['MovieController@destroy',$movie->id]])}}

            {!! Form::submit('Delete movie',['class'=>'btn btn-danger']) !!}

            {!! Form::close() !!}
        </p>
    </div>
    <div class="col-sm-8 col-sm-offset-1 col-lg-8 col-lg-offset-1">
        <div>
            <p>{{$movie->id}}</p>
            <p>{{$movie->title}}</p>
            <p>{{$movie->author}}</p>
        </div>

        <div>
            @if($movie->photos)
                @foreach($movie->photos as $item)
                    @if($item->photo)
                    <a href="#" data-toggle="modal" data-target="#showImage"
                       title="Show image"
                       class="show_image"
                       data-image-id="{{$item->photo->id}}"
                       data-image-path="{{$item->photo->path}}"
                    >
                        <img style="border-radius: 30px;" width="160" height="160" src="{{$item->photo->path}}" alt="">
                    </a>
                    @endif
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
                    @if($movie->user_id==Auth::id())
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

        @if(Session::has('movie_change'))
        new Noty({
            type: 'success',
            layout: 'topRight',
            text: '{{session('movie_change')}}'
        }).show();
        @endif
    </script>
@endsection