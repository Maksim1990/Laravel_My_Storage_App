<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Caveat+Brush" rel="stylesheet">
    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }


        #box1 {
            height: 100vh;
            width: 100%;
            background-image: url({{"/images/paralax/5.jpg"}});
            background-size: cover;
            display: table;
            background-attachment: fixed;
        }

        #box2 {
            height: 100vh;
            width: 100%;
            background-image: url({{"/images/paralax/2.jpg"}});
            background-size: cover;
            display: table;
            background-attachment: fixed;
        }

        #box3 {
            height: 100vh;
            width: 100%;
            background-image: url({{"/images/paralax/6.jpg"}});
            background-size: cover;
            display: table;
            background-attachment: fixed;
        }

        h1 {
            font-family: arial black;
            font-size: 50px;
            color: white;
            margin: 0px;
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }
        h2{
            font-size: 50px;
            color: white;
        }


        #box_desc_1,#box_desc_2 {
            height: 100%;
            font-size: 30px;
            padding-top: 10%;
            color: white;
        }

        #box1 h1, #box_desc_1 h2, #box_desc_2 h2 , #box3 h1{
            @if(LaravelLocalization::getCurrentLocale()!='ru')
            font-size:95px;
            @else
            font-size:55px;
            @endif
            text-transform: uppercase;
            font-family: 'Caveat Brush', cursive;

        }
        #box1 h2{
            font-size: 35px;
        }
        #box_desc_1 p ,#box_desc_2 p {
            padding: 50px 50px;
            width: 80%;
            border-radius: 20px;
            font-weight: 100;
            background-color: rgba(128,128,128, 0.8);
        }

        #box_desc_2{
            padding-left: 15%;

        }
        #box_desc_2 p{
            width: 100%;
        }

        #box1_head {
            height: 100%;
            padding-top: 5%;
            color: white;
        }

        .navbar {
            overflow: hidden;
            background-color: rgba(0, 0, 0, 0.4);
            position: fixed; /* Set the navbar to fixed position */
            top: 0; /* Position the navbar at the top of the page */
            width: 100%; /* Full width */
            color:white;
            padding-right: 5%;
            z-index: 100;
        }

        /* Links inside the navbar */
        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            float: right;
        }



        p.shadow {
            width: 284px;
            padding: 10px 10px 20px 10px;
            border: 1px solid #BFBFBF;
            background-color: white;
            box-shadow: 10px 10px 5px #aaaaaa;
        }

        p.shadow:hover {
            box-shadow: 10px 10px 5px whitesmoke;
        }
        .btn-success{
            padding: 15px 15px;
            font-size: 30px;
            width: 50%;
        }
        @media(max-width:1000px){
            #box1 h1,h1,h2, #box_desc_1, #box_desc_2{
                font-size: 21px;
            }
            #box1 h1{
                font-size: 41px;
            }
            #box_desc_1, #box_desc_2{
                margin-bottom: 50px;
            }
            #box_desc_2{
                padding-left: 5%;
                width: 90%;
            }
            #box_desc_2 p,#box_desc_1 p{
                width: 90%;
            }
        }
    </style>
</head>
<body>
<div class="navbar w3-right">


    <div  style="float: right;">
@if (Route::has('login'))
    <div class="top-right links">
        @auth
            <a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale() .'/users/'.Auth::id())}}">@lang('messages.my_profile')</a>
        @else
            <a href="{{ route('login') }}">@lang('messages.login')</a>
            <a href="{{ route('register') }}">@lang('messages.register')</a>
        @endauth
    </div>
@endif
</div>
    <div id="lang_block" style="float: right;margin-right: 20px;">
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
            <a rel="alternate" style="padding-left: 6px;padding-right: 6px;" class="lang" hreflang="{{ $localeCode }}"
               href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                <img style="border-radius: 30px;" width="25" height="25"
                     src="{{asset('images/includes/flags/'.$strImage.'.png')}}" alt="">
            </a>
        @endforeach
    </div>
</div>
<div id="box1" class="w3-center">
    <div class="w3-container">
        <div class="w3-display-container " style="height: 100vh;">
            <div class="w3-display-middle">
                <p><h1>@lang('messages.save_all_books')! </h1><br></p>
                <p><h2>@lang('messages.lets_keep_memories')</h2><br></p>
                <a class="btn btn-success" href="{{URL::to('/'.LaravelLocalization::getCurrentLocale() .'/users/'.Auth::id())}}">@lang('messages.try_it_now')</a>
            </div>
        </div>
    </div>

</div>
<div id="box2">

    <div class="col-sm-12 col-xs-12">
        <div class="col-sm-6 col-xs-12">
            <div id="box_desc_1">
                <p class=" col-sm-12 col-xs-12 shadow">
                    @lang('messages.read_books_and_keep')
                </p>
                <div class=" col-sm-12 col-xs-12 w3-center" style="padding-left: 10%;margin-bottom: 40px; margin-top: 40px;">
                    <h2>@lang('messages.dream')</h2>
                </div>
                <p class=" col-sm-12 col-xs-12 shadow">
                    @lang('messages.see_what_other_people_read')
                </p>

            </div>
        </div>
        <div class="col-sm-5 col-sm-offset-1 col-xs-12" id="box1_head">
            <div id="box_desc_2">
                <div class=" col-sm-12 col-xs-12 w3-center" style="padding-bottom:30px;">
                    <h2>@lang('messages.motivate')</h2>
                </div>
                <p class=" col-sm-12 col-xs-12 shadow" id="box2_info">
                    @lang('messages.read_opinions_and_leave_comments')
                </p>
                <div class=" col-sm-12 col-xs-12 w3-center" style="padding-top:30px;">
                    <h2>@lang('messages.inspire')</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="box3">
    <div class="w3-container">
        <div class="w3-display-container w3-center" style="height: 100vh;">
            <div class="w3-display-middle">
                <p><h1>@lang('messages.import_export_books')</h1><br></p>
                <p><h2>@lang('messages.it_has_not_easy_before')! </h2><br></p>
                <a class="btn btn-success" href="{{URL::to('/'.LaravelLocalization::getCurrentLocale() .'/users/'.Auth::id())}}">@lang('messages.try_it_now')</a>
            </div>
        </div>
    </div>

</div>
</body>
</html>