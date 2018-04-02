@extends('layouts.admin')
@section ('scripts_header')

@endsection
@section('styles')
    <style>
        .tooltip_custom .tooltiptext {
            width: 300px;
        }
    </style>
@endsection
@section('content')
    <div class="w3-center col-sm-12  col-lg-12 col-xs-12" style="padding-top: 150px;">
        <h1 class="text-uppercase">@lang('messages.my') @lang('messages.favorites')</h1>
    </div>
    <div class="col-sm-6  col-lg-6 col-xs-12">
        <div class="col-sm-12 col-xs-12" style="margin-bottom: 100px;">
            <h1 >@lang_u('messages.all') @lang('messages.books')</h1>
            @if(count($books)>0)
                <table class="w3-table w3-striped w3-bordered w3-hoverable">
                    <tr>
                        <th>@lang('messages.title')</th>
                        <th>@lang('messages.author')</th>
                        <th>@lang('messages.remove_from_favorite_list')</th>
                    </tr>

                    @foreach($books as $book)
                        <tr id="module_1_{{$book->id}}">
                            <td>
                                <div class="tooltip_custom"><i class="fas fa-info-circle w3-text-green"></i>
                                    <span class="tooltiptext">{!! str_limit($book->description, 400) !!}</span>
                                </div>
                                <a href="{{URL::to(LaravelLocalization::getCurrentLocale() .'/books/'.$book->id)}}">
                                    {{$book->title}}</a></td>
                            <td>{{$book->author}}</td>
                            <td class="w3-center"><a href="#" class="remove" data-id="{{$book->id}}" data-module="1"> <i
                                            class="fas fa-trash-alt w3-text-red"></i></a></td>
                        </tr>
                    @endforeach
                </table>
            @else
                <h3>@lang('messages.no_books_favorite_list')</h3>
            @endif
        </div>
    </div>
    <div class="col-sm-6  col-lg-6 col-xs-12">
        <div class="col-sm-12 col-xs-12" style="margin-bottom: 100px;">
            <h1>@lang_u('messages.all') @lang('messages.movies')</h1>
            @if(count($movies)>0)
                <table class="w3-table w3-striped w3-bordered w3-hoverable">
                    <tr>
                        <th>@lang('messages.title')</th>
                        <th>@lang('messages.author')</th>
                        <th>@lang('messages.remove_from_favorite_list')</th>
                    </tr>

                    @foreach($movies as $movie)
                        <tr id="module_2_{{$movie->id}}">
                            <td>
                                <div class="tooltip_custom"><i class="fas fa-info-circle w3-text-green"></i>
                                    <span class="tooltiptext">{!! str_limit($movie->description, 400) !!}</span>
                                </div>
                                <a href="{{URL::to(LaravelLocalization::getCurrentLocale() .'/movies/'.$movie->id)}}">
                                    {{$movie->title}}</a></td>
                            <td>{{$movie->author}}</td>
                            <td class="w3-center"><a href="#" class="remove" data-id="{{$movie->id}}" data-module="2">
                                    <i class="fas fa-trash-alt w3-text-red"></i></a></td>
                        </tr>
                    @endforeach
                </table>
            @else
                <h3>@lang('messages.no_movies_favorite_list')</h3>
            @endif
        </div>
    </div>




@stop
@section('scripts')
    <script>
        //-- Add to favorite functionality
        var token = '{{\Illuminate\Support\Facades\Session::token()}}';
        $(".remove").click(function () {
            var urlFavorite = '{{ URL::to('add_book_to_favorite_ajax') }}';
            var item_number = $(this).data('id');
            var module_id = $(this).data('module');
            var strStatus = "dislike";
            var blnConfirm = confirm("{{trans('messages.delete_selected_item')}}?");
            if (blnConfirm == true) {
                $.ajax({
                    method: 'POST',
                    url: urlFavorite,
                    dataType: "json",
                    data: {
                        strStatus: strStatus,
                        item_number: item_number,
                        module_id: module_id,
                        _token: token
                    },
                    async: true,
                    success: function (data) {
                        if (data['status']) {
                            $("#module_" + module_id + "_" + item_number).hide();
                            var strInfo = 'Removed from favorite';
                            new Noty({
                                type: 'success',
                                layout: 'topRight',
                                text: strInfo
                            }).show();

                        }
                    }
                });
            }
        });

    </script>
@endsection