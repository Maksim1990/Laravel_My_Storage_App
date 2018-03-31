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
            <h1>MY FAVORITES</h1>
        </div>
        <div class="col-sm-12 col-xs-12" style="margin-bottom: 100px;">
            <h1>All books</h1>
            @if(count($books)>0)
                <table class="w3-table w3-striped w3-bordered w3-hoverable">
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Remove from favorites</th>
                    </tr>

                    @foreach($books as $book)
                        <tr id="module_1_{{$book->id}}">
                            <td>
                                <div class="tooltip_custom"><i class="fas fa-info-circle w3-text-green"></i>
                                    <span class="tooltiptext">{!! str_limit($book->description, 400) !!}</span>
                                </div>
                                <a href="{{URL::to(LaravelLocalization::getCurrentLocale() .'/books/'.$book->id)}}" >
                                    {{$book->title}}</a></td>
                            <td>{{$book->author}}</td>
                            <td class="w3-center"><a href="#" class="remove" data-id="{{$book->id}}" data-module="1"> <i class="fas fa-trash-alt w3-text-red" ></i></a></td>
                        </tr>
                    @endforeach
                </table>
            @else
                <h3>No books in favorite list</h3>
            @endif
        </div>
        <div class="col-sm-12 col-xs-12" style="margin-bottom: 100px;">
            <h1>All movies</h1>
            @if(count($movies)>0)
                <table class="w3-table w3-striped w3-bordered w3-hoverable">
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Remove from favorites</th>
                    </tr>

                    @foreach($movies as $movie)
                        <tr id="module_2_{{$movie->id}}">
                            <td>
                                <div class="tooltip_custom"><i class="fas fa-info-circle w3-text-green"></i>
                                    <span class="tooltiptext">{!! str_limit($movie->description, 400) !!}</span>
                                </div>
                                <a href="{{URL::to(LaravelLocalization::getCurrentLocale() .'/movies/'.$movie->id)}}" >
                                    {{$movie->title}}</a></td>
                            <td>{{$movie->author}}</td>
                            <td class="w3-center"><a href="#" class="remove" data-id="{{$movie->id}}" data-module="2"> <i class="fas fa-trash-alt w3-text-red" ></i></a></td>
                        </tr>
                    @endforeach
                </table>
            @else
                <h3>No movies in favorite list</h3>
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
            var strStatus="dislike";
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