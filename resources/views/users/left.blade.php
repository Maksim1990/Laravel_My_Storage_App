<div class="w3-center " id="user_left">
    @if($user->id==Auth::id())
    <p><a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/users/'.$user->id."/edit")}}">@lang('messages.edit_profile_data')</a></p>
    <p><a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/users/'.$user->id."/edit/image")}}">@lang('messages.change_profile_image')</a></p>
    <p><a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/users/'.$user->id."/edit/profile")}}">@lang('messages.edit_profile_data')</a></p>
    <p><a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/users/'.$user->id."/edit/password")}}">@lang('messages.change_password')</a></p>
    <p><a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/favorites/'.$user->id)}}">@lang('messages.see_my_favorites')</a></p>
    <p><a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/ratings/'.$user->id)}}">@lang('messages.my') @lang('messages.votes')</a></p>
    <p><a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/comments/'.$user->id)}}">@lang('messages.my')  @lang('messages.comments')</a></p>
    <p><a href="#">@lang('messages.statistics')</a></p>
    <div>
        <a href="#" onclick="document.getElementById('id04').style.display='block'" class="btn btn-danger">
            @lang('messages.delete_profile')
        </a>
    </div>
        @endif

        @include('includes.advertise')
</div>