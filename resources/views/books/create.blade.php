@extends('layouts.admin')
@section('content')
    <div>
        <p>Add new book</p>

        {!! Form::open(['method'=>'POST','action'=>'BookController@store', 'files'=>true])!!}
        <div class="group-form">
            {!! Form::label('title','Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>

        <div class="group-form">
            {!! Form::label('description','Description:') !!}
            {!! Form::text('description', null, ['class'=>'form-control']) !!}
        </div>

        <div class="group-form">
            {!! Form::label('category_id','Category:') !!}
            {!! Form::select('category_id', [""=>"Choose category"]+$categories,null, ['class'=>'form-control','id'=>'chooseCategory']) !!}
        </div>

        <div class="group-form">
            {!! Form::label('publish_year','Publish year:') !!}
            {!! Form::text('publish_year', null, ['class'=>'form-control']) !!}
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
        @if(Session::has('book_change'))
        new Noty({
            type: 'warning',
            layout: 'topRight',
            text: '{{session('book_change')}}'
        }).show();
        @endif
    </script>
@endsection