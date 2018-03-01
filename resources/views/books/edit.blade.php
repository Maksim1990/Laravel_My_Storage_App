@extends('layouts.admin')
@section('content')
    <div>
        <p>Edit book</p>

        {{ Form::model($book, ['method' =>'PATCH' , 'action' => ['BookController@update',$book->id],'files'=>true])}}
        <div class="group-form">
            {!! Form::label('title','Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>

        <div class="group-form">
            {!! Form::label('description','Description:') !!}
            {!! Form::text('description', null, ['class'=>'form-control']) !!}
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
        {!! Form::submit('Edit',['class'=>'btn btn-warning']) !!}

        {!! Form::close() !!}
    </div>
    <br/>
    {{ Form::open(['method' =>'DELETE' , 'action' => ['BookController@destroy',$book->id]])}}

    {!! Form::submit('Delete book',['class'=>'btn btn-danger']) !!}

    {!! Form::close() !!}
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