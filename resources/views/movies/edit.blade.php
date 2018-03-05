@extends('layouts.admin')
@section('content')
    <div>
        <p>Edit book</p>

        {{ Form::model($movie, ['method' =>'PATCH' , 'action' => ['MovieController@update',$movie->id],'files'=>true])}}
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
            {{ Form::checkbox('active',1,null, ['class' => 'field','id'=>'movie_active']) }}
        </div>
        <div class="group-form">
            {!! Form::label('photo_id','Photo:') !!}
            {!! Form::file('photo_id') !!}
        </div>
        <br/><br/>
        {!! Form::submit('Edit',['class'=>'btn btn-warning']) !!}

        {!! Form::close() !!}
    </div>
    <br/>
    {{ Form::open(['method' =>'DELETE' , 'action' => ['MovieController@destroy',$movie->id]])}}

    {!! Form::submit('Delete book',['class'=>'btn btn-danger']) !!}

    {!! Form::close() !!}
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