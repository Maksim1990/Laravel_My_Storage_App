@extends('layouts.admin')
@section ('styles')

@endsection
@section('content')

    <div class="col-sm-7 col-sm-offset-1 col-xs-12">
        <div class="w3-center">
            <h1>All users list</h1>
        </div>
        <div class="w3-container">

            @if(count($users)>0)
            <table class="w3-table w3-striped w3-bordered w3-hoverable">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Registered at</th>
                </tr>

                @foreach($users as $user)
                    <tr>
                        <td>
                            <div class="tooltip_custom">INFO
                                <span class="tooltiptext">Tooltip text</span>
                            </div>
                            <a href="{{URL::to(LaravelLocalization::getCurrentLocale() .'/users/'.$user->id)}}" id="movie_{{$user->id}}">
                                {{$user->name}}</a></td>
                        <td>{{$user->email}}</td>
                        <td> {{$user->created_at->diffForHumans()}}</td>
                    </tr>
                @endforeach

            </table>
            @else
               <h3>No users found</h3>

            @endif

            @if($arrFilter)
                {!! $users->appends($arrFilter)->links() !!}
            @else
                {!! $users->links() !!}
            @endif
        </div>
    </div>
@endsection