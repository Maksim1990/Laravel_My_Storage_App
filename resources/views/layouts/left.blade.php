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



        <a id="Link1" onclick="myFunc('Link_block_1')" href="javascript:void(0)" class="w3-bar-item w3-button"><i
                    class="fa fa-inbox w3-margin-right"></i>@lang('messages.my_profile')<i
                    class="fa fa-caret-down w3-margin-left"></i></a>

        <div id="Link_block_1" class="w3-hide w3-animate-left" style="padding-left: 10px;">
            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom "
               onclick="openMail('Borge');w3_close();" id="firstTab">
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
                    <p><a href="#">@lang('messages.change_profile_image')</a></p>
                    <p><a href="#">@lang('messages.delete_profile')</a></p>
                </div>
            </div>

            <a href="javascript:void(0)" class=" w3-button"
               onclick="openMail('John');w3_close();">
                <div class="w3-container" style="padding-top: 0;padding-bottom: 0;margin-top: -25px;">
                    <div id="plan_left" class="w3-center w3-text-yellow">
                        <a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale() .'/plans')}}" class="w3-text-yellow" style="border:none;">
                            @lang('messages.your_current_plan_is') <span class="text-uppercase">{{Auth::user()->setting->subscription_plan}}</span></a>
                    </div>
                </div>
            </a>
        </div>

        <a id="Link2" onclick="myFunc('Link_block_2')" href="javascript:void(0)" class="w3-bar-item w3-button"><i
                    class="fa fa-inbox w3-margin-right"></i>@lang_u('messages.books')<i class="fa fa-caret-down w3-margin-left"></i></a>
        <div id="Link_block_2" class="w3-hide w3-animate-left" style="padding-left: 30px;">
            <a href="{{URL::to(LaravelLocalization::getCurrentLocale() .'/books/list/'.Auth::id())}}" class="w3-bar-item w3-button"><i
                        class="fa fa-paper-plane w3-margin-right"></i>@lang('messages.my') @lang_u('messages.books')</a>
            </a> <a href="{{URL::to(LaravelLocalization::getCurrentLocale() .'/books/list')}}" class="w3-bar-item w3-button"><i
                        class="fa fa-paper-plane w3-margin-right"></i>@lang_u('messages.all') @lang_u('messages.books')</a></a>
            <a href="{{URL::to(LaravelLocalization::getCurrentLocale() .'/books/create')}}" class="w3-bar-item w3-button"><i class="fa fa-hourglass-end w3-margin-right"></i>@lang_u('messages.add') @lang_u('messages.books')</a>
            <a href="{{URL::to(LaravelLocalization::getCurrentLocale() .'/import_books_main')}}" class="w3-bar-item w3-button"><i class="fa fa-trash w3-margin-right"></i>@lang('messages.import_export')
                @lang('messages.books')</a>
        </div>


        <a id="Link3" onclick="myFunc('Link_block_3')" href="javascript:void(0)" class="w3-bar-item w3-button"><i
                    class="fa fa-inbox w3-margin-right"></i>@lang_u('messages.movies')<i class="fa fa-caret-down w3-margin-left"></i></a>
        <div id="Link_block_3" class="w3-hide w3-animate-left" style="padding-left: 30px;">
            <a href="{{URL::to(LaravelLocalization::getCurrentLocale() .'/movies/list/'.Auth::id())}}" class="w3-bar-item w3-button"><i
                        class="fa fa-paper-plane w3-margin-right"></i>@lang('messages.my') @lang_u('messages.movies')</a></a>
            <a href="{{URL::to(LaravelLocalization::getCurrentLocale() .'/movies/list')}}" class="w3-bar-item w3-button"><i
                        class="fa fa-paper-plane w3-margin-right"></i>@lang_u('messages.all') @lang_u('messages.movies')</a></a>
            <a href="{{URL::to(LaravelLocalization::getCurrentLocale() .'/movies/create')}}" class="w3-bar-item w3-button"><i class="fa fa-hourglass-end w3-margin-right">
                </i>@lang_u('messages.add') @lang_u('messages.movies')</a>
            <a href="{{URL::to(LaravelLocalization::getCurrentLocale() .'/import_movies_main')}}" class="w3-bar-item w3-button"><i class="fa fa-trash w3-margin-right"></i>@lang('messages.import_export')
            @lang('messages.movies')</a>
        </div>

        <a id="Link4" onclick="myFunc('Link_block_4')" href="javascript:void(0)" class="w3-bar-item w3-button"><i
                    class="fa fa-inbox w3-margin-right"></i>@lang('messages.other_functions')<i
                    class="fa fa-caret-down w3-margin-left"></i></a>
        <div id="Link_block_4" class="w3-hide w3-animate-left" style="padding-left: 30px;">
            <a href="{{URL::to(LaravelLocalization::getCurrentLocale() .'/import_export')}}" class="w3-bar-item w3-button"><i
                        class="fa fa-paper-plane w3-margin-right"></i>@lang('messages.import_export')</a></a>
            <a href="{{URL::to(LaravelLocalization::getCurrentLocale() .'/search')}}" class="w3-bar-item w3-button"><i class="fa fa-hourglass-end w3-margin-right"></i>@lang('messages.instant_search')</a>
            <a href="{{URL::to(LaravelLocalization::getCurrentLocale() .'/categories')}}" class="w3-bar-item w3-button"><i class="fa fa-trash w3-margin-right"></i>@lang('messages.view_all_categories')</a>
        </div>

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

