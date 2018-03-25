@extends('layouts.admin')
@section ('content')
    <div>
        <div class="col-sm-5 col-xs-12">
            <p>Edit User</p>
            <div class="col-sm-3">
                <img height="200"
                     src="{{!empty($user->profile->photo_id) ? $user->profile->photo->path :"/images/includes/noImage.jpg"}}"
                     class="image-responsive" alt="">
            </div>
        </div>
        <div class="col-sm-5  col-xs-12">
            {{ Form::model($user, ['method' =>'PATCH' , 'action' => ['UserController@update',$user->id],'files'=>true])}}
            <div class="group-form">
                {!! Form::label('name','User name:') !!}
                {!! Form::text('name', null, ['class'=>'w3-input w3-hover-light-grey w3-border']) !!}
            </div>
            <div class="group-form">
                {!! Form::label('email','User email:') !!}
                {!! Form::email('email', null, ['class'=>'w3-input w3-hover-light-grey w3-border']) !!}
            </div>
            @if(Auth::user()->role_id=="1")
                <div class="group-form">
                    {!! Form::label('role_id','Role:') !!}
                    {!! Form::select('role_id',$roles,null, ['class'=>'w3-input w3-hover-light-grey w3-border']) !!}
                </div>
            @endif
            <div class="group-form">
                {!! Form::label('photo_id','Photo:') !!}
                {!! Form::file('photo_id') !!}
            </div>

            @if(Auth::user()->role_id=="1")
                <div class="group-form">
                    {!! Form::label('is_active','Status:') !!}
                    {!! Form::select('is_active',[1=>"Active",0=>"Not Active"],null, ['class'=>'w3-input w3-hover-light-grey w3-border']) !!}
                </div>
            @endif


            <br>
            {!! Form::submit('Update User',['class'=>'btn btn-warning']) !!}
            @if(Auth::id()==$user->id)
                {!! Form::close() !!}
                {{ Form::open(['method' =>'DELETE' , 'action' => ['UserController@destroy',$user->id]])}}

                {!! Form::submit('Delete User',['class'=>'btn btn-danger']) !!}

                {!! Form::close() !!}
            @endif
            @include('includes.formErrors')
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