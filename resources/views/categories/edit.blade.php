@extends('layouts.admin')
@section ('content')
    <div>
        <p>@lang('messages.create') @lang('messages.category')</p>

        {!! Form::model($category,['method'=>'PATCH','action'=>['CategoryController@update',$category->id], 'files'=>true])!!}
        <div class="group-form">
            {!! Form::label('name',trans('messages.name').':') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        {!! Form::submit(trans('messages.update_category')) !!}

        {!! Form::close() !!}
        {{ Form::open(['method' =>'DELETE' , 'action' => ['CategoryController@destroy',$category->id]])}}

        {!! Form::submit(trans('messages.delete')) !!}

        {!! Form::close() !!}
    </div>
    @include('includes.formErrors')
@stop