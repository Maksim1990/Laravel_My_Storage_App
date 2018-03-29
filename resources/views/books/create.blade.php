@extends('layouts.admin')
@section('content')
    <div>
        <p>@lang('messages.add_new') @lang('messages.book')</p>

        {!! Form::open(['method'=>'POST','action'=>'BookController@store', 'files'=>true])!!}
        <div class="group-form">
            {!! Form::label('title',trans('messages.title').':') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>

        <div class="group-form">
            {!! Form::label('description',trans('messages.description').':') !!}
            {!! Form::text('description', null, ['class'=>'form-control']) !!}
        </div>

        <div class="group-form">
            {!! Form::label('category_id',trans('messages.category').':') !!}
            {!! Form::select('category_id', [""=>trans('messages.choose_category')]+$categories,null, ['class'=>'form-control','id'=>'chooseCategory']) !!}
        </div>

        <div class="group-form">
            {!! Form::label('publish_year',trans('messages.published_year').':') !!}
            {!! Form::text('publish_year', null, ['class'=>'form-control']) !!}
        </div>
        <div class="group-form">
            {!! Form::label('photo_id',trans('messages.photo').':') !!}
            {!! Form::file('photo_id') !!}
        </div>
        <br/><br/>
        {!! Form::submit(trans('messages.add'),['class'=>'btn btn-warning']) !!}

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