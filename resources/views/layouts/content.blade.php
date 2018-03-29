<!-- Page content -->
<div class="w3-main" style="margin-left:320px;">
    <span id="menu_icon" class="   w3-margin-left  w3-margin-top" onclick="w3_open()"><i style="font-size: 30px;
    margin-top: 10px;
    z-index: 2000;
    position: fixed;
    top: 0px;
color:white;"
                                                                                         class="fas fa-bars"></i></span>
    <a href="javascript:void(0)" class="w3-hide-large w3-red w3-button w3-right w3-margin-top w3-margin-right"
       onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-pencil"></i></a>


    {{--START of Fixed bar menu--}}

    <div class="navbar ">
        <div id="navbar_step" class="span6" data-step="2" data-intro="Instant link to your profile and search functionality are on menu top bar" data-position='bottom'>
        <a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale() .'/plans')}}" style="padding-top: 5px;padding-bottom: 2px" id="current_plan_link">
            <span style="text-transform: capitalize;font-size: 12px;">@lang('messages.current_plan')</span>
            <br><span style="color: gold;font-weight: bold;">FREE</span> </a>
        <a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale() .'/users/'.Auth::id())}}">
            <img  style="border-radius: 20px;margin-top: -5px;" height="35" src="{{Auth::user()->profile->photo ? Auth::user()->profile->photo->path :"/images/includes/no_user.png"}}" alt="">
        </a>
        <a href="{{URL::to(LaravelLocalization::getCurrentLocale() .'/search')}}"><i class="fas fa-search"></i>
            @lang('messages.search')</a>
    </div>
    </div>
    {{--END of Fixed bar menu--}}

    <div class="main">
        @yield('content')
    </div>
</div>