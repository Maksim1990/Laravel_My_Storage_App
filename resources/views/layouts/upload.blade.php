@extends('layouts.admin')
@section ('styles')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.0/min/dropzone.min.css" rel="stylesheet">
@endsection
@section ('content')
    <div class="col-sm-8 col-sm-offset-1 col-lg-8 col-lg-offset-1">
        <p>Upload photo</p>

        {!! Form::open(['method'=>'POST','action'=>'PhotoController@store', 'class'=>'dropzone'])!!}

        {{ Form::hidden('user_id', Auth::id() ) }}
        {{ Form::hidden('item_id', $item->id ) }}
        {{ Form::hidden('module_id', $module_id ) }}
        {!! Form::close() !!}
    </div>
    @include('includes.formErrors')
@stop
@section ('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.0/min/dropzone.min.js"></script>
@endsection