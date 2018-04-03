@extends('layouts.admin')
@section ('scripts_header')

@endsection
@section('styles')
    <style>
        .tooltip_custom .tooltiptext{
            width: 300px;
        }
    </style>
@endsection
@section('content')

    <div class="col-sm-8 col-sm-offset-1 col-lg-8 col-lg-offset-1" style="padding-top: 150px;">
        <div class="w3-center">
            <h1 class="text-uppercase">@lang('messages.my') ratings</h1>
        </div>
        <div class="col-sm-12 col-xs-12" style="margin-bottom: 100px;">
            @if(count($ratings)>0)
                <table class="w3-table w3-striped w3-bordered w3-hoverable">
                    <tr>

                        <th>@lang('messages.module')</th>
                        <th>@lang('messages.name_of_item')</th>
                        <th>Rate value</th>
                        <th>@lang('messages.date')</th>
                    </tr>

                    @foreach($ratings as $rating)
                        <tr id="rating_{{$rating->id}}">
                            @if($rating->module_number==1)
                                @php $strModule="Books" @endphp
                            @elseif($comment->module_id==2)
                                @php $strModule="Movies" @endphp
                            @endif
                            <td>{{$strModule}}</td>
                            <td>{{$rating->item_number}}</td>
                            <td>{{$rating->rating_value}}</td>
                            <td>{{$rating->created_at->diffForHumans()}}</td>
                            <td class="w3-center"><a href="#" class="remove" data-id="{{$rating->id}}" data-module="{{$rating->id}}"> <i class="fas fa-trash-alt w3-text-red" ></i></a></td>
                        </tr>
                    @endforeach
                </table>
            @else
                <h3>@lang('messages.no_comments')</h3>
            @endif
        </div>

    </div>




@stop
@section('scripts')

@endsection