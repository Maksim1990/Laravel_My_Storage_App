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
                        <th></th>
                    </tr>

                    @foreach($ratings as $rating)
                        <tr id="ratingItem_{{$rating->id}}">
                            @if($rating->module_number==1)
                                @php $strModule="Books";
                                $strType="books";
                                $ratingItemTitle=$arrBooks[$rating->item_number];
                                @endphp
                            @elseif($comment->module_id==2)
                                @php $strModule="Movies";
                                $strType="movies";
                                $ratingItemTitle=$arrMovies[$rating->item_number];
                                @endphp
                            @endif
                            <td>{{$strModule}}</td>
                            <td>
                                <a href="{{URL::to(LaravelLocalization::getCurrentLocale() .'/'.$strType.'/'.$rating->item_number)}}">
                                    {{$ratingItemTitle}}</a></td>
                            <td>{{$rating->rating_value}}</td>
                            <td>{{$rating->created_at->diffForHumans()}}</td>
                            <td class="w3-center"><a href="#" class="remove" data-id="{{$rating->id}}" > <i class="fas fa-trash-alt w3-text-red" ></i></a></td>
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
    <script>
        //-- Add to favorite functionality
        var token = '{{\Illuminate\Support\Facades\Session::token()}}';
        $(".remove").click(function () {
            var rating_id = $(this).data('id');
            var urlDeleteComment = '{{ URL::to('delete_rating_ajax') }}';
            var blnConfirm = confirm("{{trans('messages.delete_selected_item')}}?");
            if (blnConfirm == true) {
                $.ajax({
                    method: 'POST',
                    url: urlDeleteComment,
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