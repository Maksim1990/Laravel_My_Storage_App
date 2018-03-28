<!-- Side Navigation -->
<nav class="w3-sidebar w3-bar-block w3-collapse w3-white w3-animate-left w3-card" style="z-index:3;width:320px;"
     id="mySidebar">
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom w3-large"><img
                src="https://www.w3schools.com/images/w3schools.png" style="width:60%;"></a>
    <a href="javascript:void(0)" onclick="w3_close()" title="Close Sidemenu"
       class="w3-bar-item w3-button w3-hide-large w3-large">Close <i class="fa fa-remove"></i></a>
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-dark-grey w3-button w3-hover-black w3-left-align"
       onclick="document.getElementById('id01').style.display='block'">New Message <i
                class="w3-padding fa fa-pencil"></i></a>
    <a id="Link1" onclick="myFunc('Link_block_1')" href="javascript:void(0)" class="w3-bar-item w3-button"><i
                class="fa fa-inbox w3-margin-right"></i>My Profile<i class="fa fa-caret-down w3-margin-left"></i></a>
    <div id="Link_block_1" class="w3-hide w3-animate-left">
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom "
           onclick="openMail('Borge');w3_close();" id="firstTab">
            <div class="w3-container w3-center">
                <a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale() .'/users/'.Auth::id())}}">
                    <img style="border-radius: 20px;margin-top: -3px;" height="35"
                         src="{{Auth::user()->profile->photo ? Auth::user()->profile->photo->path :"/images/includes/no_user.png"}}"
                         alt="">
                    <p
                            class="w3-opacity w3-large" style="margin-top: 15px;margin-left: 10px;display: inline-block;">{{Auth::user()->name}} {{Auth::user()->profile->lastname?Auth::user()->profile->lastname:""}}</p></a>
            </div>
        </a>

            <div class="w3-container">
                <div class="w3-center " id="main_left">
                    <p><a href="#">Edit profile data</a></p>
                    <p><a href="#">Change password</a></p>
                    <p><a href="#">Change profile image</a></p>
                    <p><a href="#">Delete profile</a></p>
                </div>
            </div>

        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom "
           onclick="openMail('John');w3_close();">
            <div class="w3-container">
                <div id="plan_left" class="w3-center w3-text-yellow">
                    Your current plan is FREE
                </div>
            </div>
        </a>
    </div>

    <a id="Link2" onclick="myFunc('Link_block_2')" href="javascript:void(0)" class="w3-bar-item w3-button"><i
                class="fa fa-inbox w3-margin-right"></i>My Books<i class="fa fa-caret-down w3-margin-left"></i></a>
    <div id="Link_block_2" class="w3-hide w3-animate-left">
        <a href="{{URL::to('books/create ')}}" class="w3-bar-item w3-button"><i
                    class="fa fa-paper-plane w3-margin-right"></i>My books</a>
        </a> <a href="{{URL::to('books/create ')}}" class="w3-bar-item w3-button"><i
                    class="fa fa-paper-plane w3-margin-right"></i>All books</a></a>
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-hourglass-end w3-margin-right"></i>Add book</a>
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-trash w3-margin-right"></i>Import/ Export books</a>
    </div>


    <a id="Link3" onclick="myFunc('Link_block_3')" href="javascript:void(0)" class="w3-bar-item w3-button"><i
                class="fa fa-inbox w3-margin-right"></i>My Movies<i class="fa fa-caret-down w3-margin-left"></i></a>
    <div id="Link_block_3" class="w3-hide w3-animate-left">
        <a href="{{URL::to('books/create ')}}" class="w3-bar-item w3-button"><i
                    class="fa fa-paper-plane w3-margin-right"></i>My movies</a></a>
        <a href="{{URL::to('books/create ')}}" class="w3-bar-item w3-button"><i
                    class="fa fa-paper-plane w3-margin-right"></i>All movies</a></a>
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-hourglass-end w3-margin-right"></i>Add movie</a>
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-trash w3-margin-right"></i>Import/ Export movies</a>
    </div>

    <a id="Link4" onclick="myFunc('Link_block_4')" href="javascript:void(0)" class="w3-bar-item w3-button"><i
                class="fa fa-inbox w3-margin-right"></i>Other users<i class="fa fa-caret-down w3-margin-left"></i></a>
    <div id="Link_block_4" class="w3-hide w3-animate-left">
        <a href="{{URL::to('books/create ')}}" class="w3-bar-item w3-button"><i
                    class="fa fa-paper-plane w3-margin-right"></i>Add book55</a></a>
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-hourglass-end w3-margin-right"></i>Add movie55</a>
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-trash w3-margin-right"></i>Add sport event55</a>
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

            <div class="tooltip_custom" style="display: inline-block;">
                <a rel="alternate" hreflang="{{ $localeCode }}"
                   href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                    <img style="border-radius: 30px;" width="25" height="25"
                         src="{{asset('images/includes/flags/'.$strImage.'.png')}}" alt="">
                </a>
                <span class="tooltiptext">{{ $properties['native'] }}</span>
            </div>

        @endforeach
    </div>
</nav>

