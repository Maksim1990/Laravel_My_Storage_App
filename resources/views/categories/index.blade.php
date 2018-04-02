

@extends('layouts.admin')
@section('content')
    <div class="w3-col m6 l6">
    <div class="col-sm-10 col-sm-offset-1"  style="padding-top: 20px;">
        <p>@lang_u('messages.add') @lang('messages.category')</p>

        {!! Form::open(['method'=>'POST','action'=>'CategoryController@store'])!!}
        <div class="group-form" style="margin-bottom: 20px;">
            {!! Form::label('name',trans('messages.name').':') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        {!! Form::submit(trans('messages.create')." ".trans('messages.category'),['class'=>'btn btn-success']) !!}

        {!! Form::close() !!}

    </div>
    </div>
    <div class="w3-col m6 l6">
        <h1>@lang_u('messages.all') @lang('messages.categories')</h1>
        <div class="table-responsive">
            @if(Session::has('category_change'))
                <p class="alert alert-success">{{session('category_change')}}</p>
            @endif
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>@lang('messages.name')</th>
                    <th>@lang('messages.created_at')</th>
                    <th>@lang('messages.updated_at')</th>
                </tr>
                </thead>
                <tbody>
                @if($categories)
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td><a href="{{ URL::to('/categories/' . $category->id . '/edit') }}">{{$category->name}}</a></td>
                            <td>{{$category->created_at ? $category->created_at->diffForHumans():"No date"}}</td>
                            <td>{{$category->updated_at ? $category->updated_at->diffForHumans():"No date"}}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <div class="w3-center">
        {!! $categories->links() !!}
    </div>
    </div>
@endsection




