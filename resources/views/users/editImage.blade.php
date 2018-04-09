@extends('layouts.admin')
@section ('content')
    <div>
        <div class="col-sm-5 col-xs-12">
            <div class="col-sm-3">
                <img height="200"
                     src="{{(!empty($user->profile->photo_id) && !empty($user->profile->photo->path)) ? $user->profile->photo->path :"/images/includes/noImage.jpg"}}"
                     class="image-responsive" alt="">
            </div>
        </div>
        <div class="col-sm-5  col-xs-12">
            <div class="col-sm-6" style="padding-top:50px;">
                {{ Form::model($user, ['method' =>'PATCH' , 'action' => ['UserController@updateImage',$user->id],'files'=>true])}}

                <div class="group-form">
                    {!! Form::label('photo_id',trans('messages.photo').':') !!}
                    {!! Form::file('photo_id',['id'=>'photo_upload']) !!}
                </div>
                {!! Form::submit(trans('messages.update_image'),['class'=>'btn btn-warning','id'=>'load_image','disabled'=>'disabled']) !!}
                {!! Form::close() !!}
            </div>
            <div class="col-sm-10 col-sm-offset-1 w3-center" id="file_info" style="height: 60px;"></div>
            <div class="col-sm-12  alert alert-success" style="margin-top: 50px;" role="alert">
                <strong>@lang('messages.attention')!</strong> @lang('messages.supported_formats') <strong>PNG & JPG</strong>.<br>
                @lang('messages.image_should_not_exceed')
            </div>
            <div class="col-sm-12">
                @include('includes.formErrors')
            </div>
        </div>
    </div>

@endsection
@section ('scripts')
    <script>
        @if(Session::has('user_change'))
        new Noty({
            type: 'error',
            layout: 'bottomLeft',
            text: '{{session('user_change')}}'

        }).show();
        @endif

        $("#photo_upload").change(function () {

            var val = $(this).val();

            switch (val.substring(val.lastIndexOf('.') + 1).toLowerCase()) {
                case 'png':
                case 'jpg':
                    $('#file_info').html('File ' + val + ' is chosen');
                    $('#file_info').css('color', 'green');
                    $('#load_image').prop('disabled', false);
                    break;
                default:
                    $('#file_info').html("{{trans('messages.format_is_not_correct')}}");
                    $('#file_info').css('color', 'red');
                    $('#load_image').prop('disabled', true);
                    break;
            }
        });
    </script>
@endsection