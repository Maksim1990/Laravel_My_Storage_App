@extends('layouts.admin')
@section ('styles')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.0/min/dropzone.min.css" rel="stylesheet">
@endsection
@section ('content')
    <div class="col-sm-8 col-sm-offset-1 col-lg-8 col-lg-offset-1">
        <p style="margin-top: 30px;"><h2 class="text-uppercase">Upload photo</h2></p>

        {!! Form::open(['method'=>'POST','action'=>'PhotoController@store', 'class'=>'dropzone'])!!}

        {{ Form::hidden('user_id', Auth::id() ) }}
        {{ Form::hidden('item_id', $item->id ) }}
        {{ Form::hidden('module_id', $module_id ) }}
        {!! Form::close() !!}
    </div>
    <div class="col-sm-8 col-sm-offset-1 col-lg-8 col-lg-offset-1" style="padding-left: 15px;margin-top: 30px;">
        @if($module_id==1)
            @php $strUrlType='books'; @endphp
            @else
            @php $strUrlType='movies'; @endphp
            @endif
        <a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/'.$strUrlType.'/'. $item->id)}}" class="btn btn-success">
            @lang('messages.return_back')</a>
    </div>
    @include('includes.formErrors')
@stop
@section ('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.0/min/dropzone.min.js"></script>
@endsection