@extends('layouts.admin')
@section ('scripts_header')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
@endsection
@section('content')
    <div>
        <div class="col-sm-7 col-sm-offset-1 col-xs-12">
            <p>Create new user</p>

            {!! Form::open(['method'=>'POST','action'=>'UserController@store', 'files'=>true])!!}

            <div class="group-form">
                {!! Form::label('name','Name:') !!}
                {!! Form::text('name', null, ['class'=>'w3-input w3-hover-light-grey w3-border']) !!}
            </div>

            <div class="group-form">
                {!! Form::label('lastname','Last name:') !!}
                {!! Form::text('lastname', null, ['class'=>'w3-input w3-hover-light-grey w3-border']) !!}
            </div>

            <div class="group-form">
                {!! Form::label('birthdate','Birthdate:') !!}
                {!!  Form::text('birthdate', null, array('id' => 'datepicker')) !!}
            </div>

            <div class="group-form">
                {!! Form::label('role_id','Role:') !!}
                {!! Form::select('role_id', [""=>"Choose Option"]+$roles,null, ['class'=>'w3-input w3-hover-light-grey w3-border']) !!}
            </div>

            <div class="group-form">
                {!! Form::label('email','User email:') !!}
                {!! Form::email('email', null, ['class'=>'w3-input w3-hover-light-grey w3-border']) !!}
            </div>

            <div class="group-form">
                {!! Form::label('password','Password:') !!}
                {!! Form::password('password', ['class'=>'form-control']) !!}
            </div>

            <div class="group-form">
                {!! Form::label('status','Status:') !!}
                {!! Form::text('status', null, ['class'=>'w3-input w3-hover-light-grey w3-border']) !!}
            </div>

            <div class="group-form">
                {!! Form::label('country','Country:') !!}
                {!! Form::text('country', null, ['class'=>'w3-input w3-hover-light-grey w3-border']) !!}
            </div>

            <div class="group-form">
                {!! Form::label('city','City:') !!}
                {!! Form::text('city', null, ['class'=>'w3-input w3-hover-light-grey w3-border']) !!}
            </div>

            <div class="group-form">
                {!! Form::label('user_gender','Gender:') !!}
                <br>{!! Form::radio('user_gender', 'M', true); !!} Male <br>
                {!! Form::radio('user_gender', 'F'); !!} Female
            </div>

            <div class="group-form">
                {!! Form::label('photo_id','Photo:') !!}
                {!! Form::file('photo_id') !!}
            </div>
            <br/><br/>
            {!! Form::submit('Add',['class'=>'btn btn-warning']) !!}

            {!! Form::close() !!}
        </div>
        <div class="col-sm-7 col-sm-offset-1 col-xs-12">
            @include('includes.formErrors')
        </div>
    </div>

@stop
@section('scripts')
    <script>
        @if(Session::has('user_change'))
        new Noty({
            type: 'warning',
            layout: 'topRight',
            text: '{{session('user_change')}}'
        }).show();
        @endif
    </script>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#datepicker").datepicker({
                changeMonth: true,
                yearRange: '1950:2035',
                defaultDate: '2017',
                changeYear: true
            });
        });
    </script>
@endsection