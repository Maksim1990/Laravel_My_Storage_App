@extends('layouts.admin')
@section ('content')
    <div>

        <div class="col-sm-7  col-xs-12" style="padding-top: 50px;">
            <h5 class="text-uppercase">Choose main movie image from all images linked to this movie</h5>
            @if(count($movie->photos)>0)
                <div class="col-sm-12 col-xs-12">
                    @foreach($movie->photos as $item)
                        @if($item->photo)
                            <a href="#" id="image_{{$item->photo->id}}"
                               class="assign_image"
                               style="margin-right: 20px;"
                               data-image-id="{{$item->photo->id}}"
                               data-image-path="{{$item->photo->path}}"
                            >
                                <img style="border-radius: 30px;" width="160" height="160"
                                     src="{{$item->photo->path}}"
                                     alt="">
                            </a>
                        @endif
                    @endforeach
                </div>
            @else

                <div class="col-sm-12 col-xs-12" style="margin-bottom: 80px;">
                    <p class="w3-text-green w3-xlarge">@lang('messages.has_no_images')!</p>
                </div>
            @endif
        </div>
        <div class="col-sm-5  col-xs-12">
            <div class="col-sm-6" style="padding-top:50px;">
                <div class="col-sm-12" style="padding-left: 0px;margin-bottom: 30px;">
                    <a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/movies/'.$movie->id)}}" class="btn btn-success">
                        @lang('messages.return_back')</a>
                </div>
                {{ Form::model($movie, ['method' =>'PATCH' , 'action' => ['MovieController@assignImage',$movie->id],'files'=>true])}}

                <div class="group-form">
                    {!! Form::label('photo_id',trans('messages.photo').':') !!}
                    {!! Form::file('photo_id') !!}
                </div>
                <br>
                {!! Form::submit(trans('messages.update_image'),['class'=>'btn btn-warning']) !!}
                {!! Form::close() !!}
            </div>
            <div class="col-sm-12">
                @include('includes.formErrors')
            </div>
        </div>
    </div>

@endsection
@section ('scripts')
    <script>
        @if(Session::has('movie_change'))
        new Noty({
            type: 'error',
            layout: 'bottomLeft',
            text: '{{session('user_change')}}'

        }).show();
            @endif

        var token = '{{\Illuminate\Support\Facades\Session::token()}}';
        var url = '{{ URL::to('assign_image_movie_ajax') }}';

        $(".assign_image").click(function () {

            var image_id = $(this).data('image-id');
            var image_path = $(this).data('image-path');
            var movie_id = '{{$movie->id}}';

            if (image_id) {
                var blnConfirm = confirm("{{trans('messages.want_assign')}}?");
                if (blnConfirm == true) {
                    $.ajax({
                        method: 'POST',
                        url: url,
                        data: {
                            image_id: image_id,
                            image_path: image_path,
                            movie_id: movie_id,
                            _token: token
                        },
                        success: function (data) {
                            if (data['status']) {
                                window.location.href = '/{{LaravelLocalization::getCurrentLocale()}}/movies/'+movie_id;

                            }
                        }
                    });

                }
            }

        });


    </script>
@endsection