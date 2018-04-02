<div class="w3-center " id="user_left">

    <p><a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/users/'.$user->id."/edit")}}">Edit
            profile</a></p>
    <p><a href="#">Change profile image</a></p>
    <p><a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/users/'.$user->id."/edit/profile")}}">@lang('messages.edit_profile_data')</a></p>
    <p><a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/users/'.$user->id."/edit/password")}}">@lang('messages.change_password')</a></p>
    <p><a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/favorites/'.$user->id)}}">See my favorites</a></p>
    <p><a href="#">My votes</a></p>
    <p><a href="#">My comments</a></p>
    <p><a href="#">Statistics</a></p>
    <div>
        {{ Form::open(['method' =>'DELETE' , 'action' => ['UserController@destroy',$user->id]])}}

        {!! Form::submit('Delete profile',['class'=>'btn btn-danger']) !!}

        {!! Form::close() !!}
    </div>
</div>