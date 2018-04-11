@extends('layouts.admin')
@section ('scripts_header')

@endsection
@section('styles')
    <script src="{{asset('js/jquery.barrating.js')}}" type="text/javascript"></script>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-stars.css') }}">
    <style>
        .tooltip_custom .tooltiptext{
            width: 300px;
        }
    </style>
@endsection
@section('content')

    <div class="col-sm-8 col-sm-offset-1 col-lg-8 col-lg-offset-1" style="padding-top: 150px;">
        <div class="w3-center">
            <h1 class="text-uppercase">@lang('messages.my') @lang('messages.votes')</h1>
        </div>
        <div class="col-sm-12 col-xs-12" style="margin-bottom: 100px;">
            @if(count($ratings)>0)
                <table class="w3-table w3-striped w3-bordered w3-hoverable">
                    <tr>
                        <th>@lang('messages.module')</th>
                        <th>@lang('messages.name_of_item')</th>
                        <th>@lang('messages.rating_value')</th>
                        <th>@lang('messages.date')</th>
                        <th></th>
                    </tr>

                    @foreach($ratings as $rating)
                        <tr id="ratingItem_{{$rating->id}}">
                            @if($rating->module_number==1)
                                @php $strModule="Books";
                                $strType="books";
                                $ratingItemTitle=$arrBooks[$rating->item_number];
                                @endphp
                            @elseif($rating->module_number==2)
                                @php $strModule="Movies";
                                $strType="movies";
                                $ratingItemTitle=$arrMovies[$rating->item_number];
                                @endphp
                            @endif
                            <td>{{$strModule}}</td>
                            <td>
                                <a href="{{URL::to(LaravelLocalization::getCurrentLocale() .'/'.$strType.'/'.$rating->item_number)}}">
                                    {{$ratingItemTitle}}</a></td>
                            <td>
                                <select class="ratingVote_{{ $rating->rating_value }}" name="rating">
                                    <option class="vote" value="1">1</option>
                                    <option class="vote" value="2">2</option>
                                    <option class="vote" value="3">3</option>
                                    <option class="vote" value="4">4</option>
                                    <option class="vote" value="5">5</option>
                                </select>
                            </td>
                            <td>{{$rating->created_at->diffForHumans()}}</td>
                            <td class="w3-center"><a href="#" class="remove" data-id="{{$rating->id}}" > <i class="fas fa-trash-alt w3-text-red" ></i></a></td>
                        </tr>
                        <script>
                            $('.ratingVote_{{ $rating->rating_value }}').barrating('show', {
                                theme: 'bootstrap-stars',
                                readonly: false
                            });
                            $('.ratingVote_{{ $rating->rating_value }}').barrating('set',{{ $rating->rating_value }});
                        </script>
                    @endforeach
                </table>
            @else
                <h3>@lang('messages.no_comments')</h3>
            @endif
        </div>

    </div>




@stop
@section('scripts')
    <script>
        //-- Add to favorite functionality
        var token = '{{\Illuminate\Support\Facades\Session::token()}}';
        $(".remove").click(function () {
            var rating_id = $(this).data('id');
            var urlDeleteRating = '{{ URL::to('delete_rating_ajax') }}';
            var blnConfirm = confirm("{{trans('messages.delete_selected_item')}}?");
            if (blnConfirm == true) {
                $.ajax({
                    method: 'POST',
                    url: urlDeleteRating,
                    dataType: "json",
                    data: {
                        rating_id: rating_id,
                        _token: token
                    },
                    async: true,
                    success: function (data) {
                        if (data['status']) {

                            $('#ratingItem_' + rating_id).hide();
                            new Noty({
                                type: 'success',
                                layout: 'topRight',
                                text: 'Your rating was removed!'
                            }).show();

                        }
                    }
                });
            }
        });

    </script>
@endsection