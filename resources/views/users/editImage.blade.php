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
                    {!! Form::file('photo_id') !!}
                </div>
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
        @if(Session::has('user_change'))
        new Noty({
            type: 'error',
            layout: 'bottomLeft',
            text: '{{session('user_change')}}'

        }).show();
        @endif
    </script>
@endsection