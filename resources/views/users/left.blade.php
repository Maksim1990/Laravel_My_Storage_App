<div class="w3-center " id="user_left">
    <p><a href="#">Change profile image</a></p>
    <p><a href="#">Change profile image</a></p>
    <p><a href="#">Change profile image</a></p>
    <p><a href="#">Change profile image</a></p>
    <p><a href="#">Change profile image</a></p>
    <p><a href="#">Change profile image</a></p>
    <p><a href="#">Change profile image</a></p>
    <p><a href="#">Change profile image</a></p>
    <p><a href="#">Change profile image</a></p>
    <p><a href="#">Change profile image</a></p>
    <p><a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/users/'.$user->id."/edit")}}">Edit
            profile</a></p>
    <div>
        {{ Form::open(['method' =>'DELETE' , 'action' => ['UserController@destroy',$user->id]])}}

        {!! Form::submit('Delete profile',['class'=>'btn btn-danger']) !!}

        {!! Form::close() !!}
    </div>
</div>