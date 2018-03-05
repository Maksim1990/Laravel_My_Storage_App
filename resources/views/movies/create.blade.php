@extends('layouts.admin')
@section('content')
    <div>
        <p>Add new book</p>

        {!! Form::open(['method'=>'POST','action'=>'MovieController@store', 'files'=>true])!!}
        <div class="group-form">
            {!! Form::label('title','Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>

        <div class="group-form">
            {!! Form::label('description','Description:') !!}
            {!! Form::text('description', null, ['class'=>'form-control']) !!}
        </div>

        <div class="group-form">
            {!! Form::label('finished_date','Finished year:') !!}
            {!! Form::text('finished_date', null, ['class'=>'form-control']) !!}
        </div>
        <div class="group-form">
            {!! Form::label('movie_created_year','Movie created year:') !!}
            {!! Form::text('movie_created_year', null, ['class'=>'form-control']) !!}
        </div>
        <div class="group-form">
            {!! Form::label('active','Is active:') !!}
            {{ Form::checkbox('active',1,true, ['class' => 'field','id'=>'movie_active']) }}
        </div>
        <div class="group-form">
            {!! Form::label('photo_id','Photo:') !!}
            {!! Form::file('photo_id') !!}
        </div>
        <br/><br/>
        {!! Form::submit('Add',['class'=>'btn btn-warning']) !!}

        {!! Form::close() !!}
    </div>
    @include('includes.formErrors')
@stop
@section('scripts')
    <script>
        @if(Session::has('movie_change'))
        new Noty({
            type: 'warning',
            layout: 'topRight',
            text: '{{session('movie_change')}}'
        }).show();
        @endif
    </script>
@endsection