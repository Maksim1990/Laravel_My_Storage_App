<div class="w3-center " id="user_left">

    <p><a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/users/'.$user->id."/edit")}}">@lang('messages.edit_profile_data')</a></p>
    <p><a href="#">Change profile image</a></p>
    <p><a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/users/'.$user->id."/edit/profile")}}">@lang('messages.edit_profile_data')</a></p>
    <p><a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/users/'.$user->id."/edit/password")}}">@lang('messages.change_password')</a></p>
    <p><a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/favorites/'.$user->id)}}">@lang('messages.see_my_favorites')</a></p>
    <p><a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/ratings/'.$user->id)}}">@lang('messages.my') @lang('messages.votes')</a></p>
    <p><a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/comments/'.$user->id)}}">@lang('messages.my')  @lang('messages.comments')</a></p>
    <p><a href="#">@lang('messages.statistics')</a></p>
    <div>
        {{ Form::open(['method' =>'DELETE' , 'action' => ['UserController@destroy',$user->id]])}}

        {!! Form::submit(trans('messages.delete_profile'),['class'=>'btn btn-danger']) !!}

        {!! Form::close() !!}
    </div>
</div>