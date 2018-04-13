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

    <div class="col-sm-8 col-sm-offset-1 col-lg-8 col-lg-offset-1" style="padding-top: 100px;">
        <div class="w3-center">
            <h1 class="text-uppercase">@lang('messages.my') @lang('messages.comments')</h1>
        </div>
        <div class="col-sm-12 col-xs-12" style="margin-bottom: 100px;">
            @if(count($comments)>0)
                <table class="w3-table w3-striped w3-bordered w3-hoverable">
                    <tr>
                        <th>@lang('messages.comment')</th>
                        <th>@lang('messages.module')</th>
                        <th>@lang('messages.name_of_item')</th>
                        <th>@lang('messages.date')</th>
                        <th></th>
                    </tr>

                    @foreach($comments as $comment)
                        <tr id="commentItem_{{$comment->id}}">
                            <td>{!! str_limit($comment->comment, 400) !!}</td>
                            @if($comment->module_id==1)
                                @php $strModule="Books";
                                $strType="books";
                                $commentItemTitle=$arrBooks[$comment->item_id];
                                @endphp
                                @elseif($comment->module_id==2)
                                @php $strModule="Movies";
                                $strType="movies";
                                $commentItemTitle=$arrMovies[$comment->item_id];
                                @endphp
                                @endif
                            <td>{{$strModule}}</td>
                            <td>
                                <a href="{{URL::to(LaravelLocalization::getCurrentLocale() .'/'.$strType.'/'.$comment->item_id)}}">
                                    {{$commentItemTitle}}</a></td>
                            <td>{{$comment->created_at->diffForHumans()}}</td>
                            <td class="w3-center"><a href="#" class="remove"  data-id="{{$comment->id}}"> <i class="fas fa-trash-alt w3-text-red" ></i></a></td>
                        </tr>
                    @endforeach
                </table>
            @else
                <h3>@lang('messages.no_comments')</h3>
            @endif
        </div>
        <div class="col-sm-10 col-sm-offset-1 col-lg-10 col-lg-offset-1">
            <div class="w3-center" id="pagination">
                    {!! $comments->links() !!}
            </div>
        </div>

    </div>
@stop
@section('scripts')
    <script>
        //-- Add to favorite functionality
        var token = '{{\Illuminate\Support\Facades\Session::token()}}';
        $(".remove").click(function () {
            var comment_id = $(this).data('id');
            var urlDeleteComment = '{{ URL::to('delete_books_comment_ajax') }}';
            var blnConfirm = confirm("{{trans('messages.delete_selected_item')}}?");
            if (blnConfirm == true) {
                @if(Auth::user()->role_id!=4)
                $.ajax({
                    method: 'POST',
                    url: urlDeleteComment,
                    dataType: "json",
                    data: {
                        comment_id: comment_id,
                        _token: token
                    },
                    async: true,
                    success: function (data) {
                        if (data['status']) {
                            $('#commentItem_' + comment_id).hide();
                            new Noty({
                                type: 'success',
                                layout: 'topRight',
                                text: 'Your comment was removed!'
                            }).show();
                        }
                    }
                });
                @else
                $('#commentItem_' + comment_id).hide();
                new Noty({
                    type: 'error',
                    layout: 'topRight',
                    text: '{{trans('messages.warning')}} {{trans('messages.on_testing_account')}}'
                }).show();
                @endif
            }
        });

    </script>
@endsection