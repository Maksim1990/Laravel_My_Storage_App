@extends('layouts.admin')
@section ('content')
    <div>
        <div class="col-sm-5 col-xs-12">
            <div class="col-sm-6">
                {{ Form::model($user, ['method' =>'PATCH' , 'action' => ['UserController@updatePassword',$user->id],'files'=>true])}}

                <div class="group-form">
                    {!! Form::label('password','Old password:') !!}
                    {!! Form::password('old_password', ['class'=>'form-control']) !!}
                </div>
                <div class="group-form">
                    {!! Form::label('password','New password:') !!}
                    {!! Form::password('password', ['class'=>'form-control']) !!}
                </div>
                <div class="group-form">
                    {!! Form::label('password','Repeat new password:') !!}
                    {!! Form::password('password_2', ['class'=>'form-control']) !!}
                </div>
                <br>
                {!! Form::submit('Update password',['class'=>'btn btn-warning']) !!}
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