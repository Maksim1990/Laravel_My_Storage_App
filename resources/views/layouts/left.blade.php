<!-- Side Navigation -->
<nav class="w3-sidebar w3-bar-block w3-collapse w3-white w3-animate-left w3-card" style="z-index:3;width:320px;"
     id="mySidebar">

    <a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale() .'/')}}" class="w3-bar-item w3-button w3-border-bottom w3-large">

        <img data-step="1" data-intro="@lang('messages.click_on_logo')!" data-position="right"
                src="{{"/images/includes/logo_black.png"}}" style="width:60%;"></a>
    <a href="javascript:void(0)" onclick="w3_close()" title="@lang('messages.close_sidemenu')"
       class="w3-bar-item w3-button w3-hide-large w3-large">Close <i class="fa fa-remove"></i></a>
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-dark-grey w3-button w3-hover-black w3-left-align"
       onclick="document.getElementById('id01').style.display='block'">@lang('messages.about_application')<i
                class="w3-padding fa fa-pencil"></i></a>



        <a id="Link1" onclick="myFunc('Link_block_1')" href="javascript:void(0)" class="w3-bar-item w3-button text-uppercase"><i
                    class="fas fa-user  w3-text-green w3-margin-right"></i>@lang('messages.my_profile')<i
                    class="fa fa-caret-down w3-margin-left"></i></a>

        <div id="Link_block_1" class="w3-hide w3-animate-left" style="padding-left: 10px;">
            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom "
               onclick="w3_close();" id="firstTab">
                <div class="w3-container w3-center">
                    <a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale() .'/users/'.Auth::id())}}" class=" span_custom" data-step="5" data-intro="@lang('messages.navigate_to_all')!" data-position="right">
                        <img style="border-radius: 20px;margin-top: -3px;" height="35"
                             src="{{Auth::user()->profile->photo ? Auth::user()->profile->photo->path :"/images/includes/no_user.png"}}"
                             alt="">
                        <p
                                class="w3-opacity w3-large"
                                style="margin-top: 15px;margin-left: 10px;display: inline-block;">{{Auth::user()->name}} {{Auth::user()->profile->lastname?Auth::user()->profile->lastname:""}}</p>
                    </a>
                </div>
            </a>

            <div class="w3-container">
                <div class="w3-center " id="main_left">
                    <p><a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/users/'.Auth::id()."/edit/profile")}}">@lang('messages.edit_profile_data')</a></p>
                    <p><a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/users/'.Auth::id()."/edit/password")}}">@lang('messages.change_password')</a></p>
                    <p><a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/users/'.Auth::id()."/edit/image")}}">@lang('messages.change_profile_image')</a></p>
                    <p> <a href="#" onclick="document.getElementById('id04').style.display='block'" >
                        @lang('messages.delete_profile')</a></p>
                </div>
            </div>

            <a href="javascript:void(0)" class=" w3-button"
               onclick="openMail('John');w3_close();">
                <div class="w3-container" style="padding-top: 0;padding-bottom: 0;margin-top: -25px;">
                    <div id="plan_left" class="w3-center w3-text-yellow">
                        @if(Auth::user()->role_id==1 || Auth::user()->role_id==4 || Auth::user()->role_id==2)
                        <a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale() .'/plans')}}" class="w3-text-yellow" style="border:none;">
                            @lang('messages.your_current_plan_is') <span class="text-uppercase">{{Auth::user()->setting->subscription_plan}}</span></a>
                        @else
                            <a href="#" class="w3-text-yellow" style="border:none;">
                                @lang('messages.your_current_plan_is') <span class="text-uppercase">{{Auth::user()->setting->subscription_plan}}</span></a>
                        @endif
                    </div>
                </div>
            </a>
        </div>

        <a id="Link2" onclick="myFunc('Link_block_2')" href="javascript:void(0)" class="w3-bar-item w3-button text-uppercase"><i
                    class="fas fa-book w3-margin-right w3-text-green"></i>@lang('messages.books')<i class="fa fa-caret-down w3-margin-left"></i></a>
        <div id="Link_block_2" class="w3-hide w3-animate-left" style="padding-left: 30px;">
            <a href="{{URL::to(LaravelLocalization::getCurrentLocale() .'/books/list/'.Auth::id())}}" class="w3-bar-item w3-button"><i
                        class="fas fa-caret-square-down w3-margin-right"></i>@lang('messages.my_books')</a>
            </a> <a href="{{URL::to(LaravelLocalization::getCurrentLocale() .'/books/list')}}" class="w3-bar-item w3-button"><i
                        class="fas fa-globe w3-margin-right"></i>@lang('messages.all') @lang('messages.books')</a></a>
            <a href="{{URL::to(LaravelLocalization::getCurrentLocale() .'/books/create')}}" class="w3-bar-item w3-button"><i class="fas fa-plus-circle w3-margin-right"></i>@lang('messages.add') @lang('messages.books')</a>
            <a href="{{URL::to(LaravelLocalization::getCurrentLocale() .'/import_books_main')}}" class="w3-bar-item w3-button"><i class="fas fa-upload w3-margin-right"></i>@lang('messages.import_export')
                @lang('messages.books')</a>
        </div>


        <a id="Link3" onclick="myFunc('Link_block_3')" href="javascript:void(0)" class="w3-bar-item w3-button text-uppercase"><i
                    class="fas fa-video w3-margin-right  w3-text-green"></i>@lang('messages.movies')<i class="fa fa-caret-down w3-margin-left"></i></a>
        <div id="Link_block_3" class="w3-hide w3-animate-left" style="padding-left: 30px;">
            <a href="{{URL::to(LaravelLocalization::getCurrentLocale() .'/movies/list/'.Auth::id())}}" class="w3-bar-item w3-button"><i
                        class="fas fa-caret-square-down w3-margin-right"></i>@lang('messages.my_movies')</a></a>
            <a href="{{URL::to(LaravelLocalization::getCurrentLocale() .'/movies/list')}}" class="w3-bar-item w3-button"><i
                        class="fas fa-globe w3-margin-right"></i>@lang('messages.all') @lang('messages.movies')</a></a>
            <a href="{{URL::to(LaravelLocalization::getCurrentLocale() .'/movies/create')}}" class="w3-bar-item w3-button"><i class="fas fa-plus-circle w3-margin-right">
                </i>@lang('messages.add') @lang('messages.movies')</a>
            <a href="{{URL::to(LaravelLocalization::getCurrentLocale() .'/import_movies_main')}}" class="w3-bar-item w3-button"><i class="fas fa-upload w3-margin-right"></i>@lang('messages.import_export')
            @lang('messages.movies')</a>
        </div>

        <a id="Link4" onclick="myFunc('Link_block_4')" href="javascript:void(0)" class="w3-bar-item w3-button text-uppercase"><i
                    class="fab fa-ethereum w3-margin-right  w3-text-green"></i>@lang('messages.other_functions')<i
                    class="fa fa-caret-down w3-margin-left"></i></a>
        <div id="Link_block_4" class="w3-hide w3-animate-left" style="padding-left: 30px;">
            <a href="{{URL::to(LaravelLocalization::getCurrentLocale() .'/import_export')}}" class="w3-bar-item w3-button"><i
                        class="fas fa-upload w3-margin-right"></i>@lang('messages.import_export')</a></a>
            <a href="{{URL::to(LaravelLocalization::getCurrentLocale() .'/search')}}" class="w3-bar-item w3-button"><i class="fas fa-search w3-margin-right"></i>@lang('messages.instant_search')</a>
            <a href="{{URL::to(LaravelLocalization::getCurrentLocale() .'/categories')}}" class="w3-bar-item w3-button"><i class="fas fa-location-arrow w3-margin-right"></i>@lang('messages.view_all_categories')</a>
            <a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/statistics')}}" class="w3-bar-item w3-button"><i class="fas fa-clipboard-list w3-margin-right"></i>@lang('messages.statistics')</a>
        </div>
    <a href="{{URL::to(LaravelLocalization::getCurrentLocale() .'/books/list/1')}}" class="w3-bar-item w3-button text-uppercase"><i
            class="fas fa-book w3-margin-right  w3-text-green"></i>@lang('messages.maksim_books')</a>

        <div id="lang_block" style="position:absolute;bottom:5%;left:10%;">
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                @if($localeCode=='th')
                    @php $strImage='th'; @endphp
                @elseif($localeCode=='fr')
                    @php $strImage='fr'; @endphp
                @elseif($localeCode=='ru')
                    @php $strImage='ru'; @endphp
                @else
                    @php $strImage='en'; @endphp
                @endif

                <div class="tooltip_custom " style="display: inline-block;" data-step="3" data-intro="@lang('messages.choose_your_language')!"  data-position='right'>
                    <a rel="alternate" hreflang="{{ $localeCode }}"
                       href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        <img style="border-radius: 30px;" width="25" height="25"
                             src="{{asset('images/includes/flags/'.$strImage.'.png')}}" alt="">
                    </a>
                    <span class="tooltiptext" style="width: 150px;">{{ $properties['native'] }}</span>
                </div>

            @endforeach
                <div class="tooltip_custom " style="display: inline-block;" >
                    <a  href="#" onclick="document.getElementById('id03').style.display='block'">
                        <img style="border-radius: 30px; margin-left: 60px;" width="45" height="45"
                             src="{{asset('images/includes/contact-icon.png')}}" alt="">
                    </a>
                    <span class="tooltiptext" style="width: 150px;">@lang('messages.contact_as')!</span>
                </div>
        </div>

</nav>


<!-- Modal that pops up when you click on "Delete profile" -->
<div id="id04" class="w3-modal" style="z-index:4">
    <div class="w3-modal-content w3-animate-zoom">
        <div class="w3-container w3-padding w3-green">
            <h2 class="text-uppercase text-uppercase">@lang('messages.delete_profile')</h2>
        </div>
        <div class="w3-panel">
            <div class="w3-section">
                <div class="w3-center">
                    <div id="delete_user_form">
                        @if(Auth::user()->role_id!=4)
                        <div>
                            <p>@lang('messages.want_to_delete_profile')?</p>
                            <div class="alert alert-warning" role="alert">
                                <strong>@lang('messages.attention')!</strong> @lang('messages.all_profile_data_will_be_lost').
                            </div>
                        </div>
                        <a class="btn btn-success " style="display: inline;padding: 10px 10px;margin-right: 30px;" onclick="document.getElementById('id04').style.display='none'">@lang('messages.cancel') </a>
                        {{ Form::open(['method' =>'DELETE' , 'action' => ['UserController@destroy',Auth::id()]])}}

                        {!! Form::submit(trans('messages.delete_profile'),['class'=>'btn btn-danger']) !!}

                        {!! Form::close() !!}
                        @else
                            <div class="alert alert-danger" role="alert">
                               <strong>{{trans('messages.warning')}}</strong> {{trans('messages.on_testing_account')}}
                            </div>
                            <a class="btn btn-success " style="display: inline;padding: 10px 10px;margin-right: 30px;" onclick="document.getElementById('id04').style.display='none'">@lang('messages.cancel') </a>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



