@extends('layouts.admin')
@section ('scripts_header')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
@endsection
@section ('content')
    <div>
        <div class="col-sm-5 col-xs-12">
            <div class="col-sm-6">
                {{ Form::model($profile, ['method' =>'PATCH' , 'action' => ['ProfileController@update',$profile->id],'files'=>true])}}
                <div class="group-form">
                    {!! Form::label('lastname',trans('messages.lastname').':') !!}
                    {!! Form::text('lastname', null, ['class'=>'w3-input w3-hover-light-grey w3-border']) !!}
                </div>
                <div class="group-form">
                    {!! Form::label('birthdate',trans('messages.birthdate').':') !!}
                    {!!  Form::text('birthdate', null, array('id' => 'datepicker')) !!}
                </div>
                <div class="group-form">
                    {!! Form::label(trans('messages.gender').':') !!}
                    <span>@lang('messages.male')</span>
                    {!! Form::radio('user_gender', 'M') !!}
                    <span>@lang('messages.female')</span>
                    {!! Form::radio('user_gender', 'F') !!}
                </div>
                <div class="group-form">
                    {!! Form::label('status',trans('messages.status').':') !!}
                    {!! Form::text('status', null, ['class'=>'w3-input w3-hover-light-grey w3-border']) !!}
                </div>
                <div class="group-form">
                    {!! Form::label('country',trans('messages.country').':') !!}
                    {!! Form::text('country', null, ['class'=>'w3-input w3-hover-light-grey w3-border']) !!}
                </div>
                <div class="group-form">
                    {!! Form::label('city',trans('messages.city').':') !!}
                    {!! Form::text('city', null, ['class'=>'w3-input w3-hover-light-grey w3-border']) !!}
                </div>
                <br>
                {!! Form::submit(trans('messages.update_user'),['class'=>'btn btn-warning']) !!}

                {!! Form::close() !!}
            </div>
        </div>

    </div>

@endsection
@section ('scripts')
    <script>
        @if(Session::has('user_change'))
        new Noty({
            type: 'error',
            layout: 'bottomLeft',
            text: '{{session('user_change')}}'

        }).show();
        @endif
    </script>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script>
        $(function() {
            $( "#datepicker" ).datepicker({
                changeMonth: true,
                yearRange: '1950:2035',
                defaultDate: '2017',
                changeYear: true
            });
        });
    </script>
@endsection