@extends('layouts.admin')

@section ('scripts_header')
    <script src="http://d3js.org/d3.v3.min.js"></script>
    <script src="http://labratrevenge.com/d3-tip/javascripts/d3.tip.v0.6.3.js"></script>
@endsection
@section ('styles')
    <link href="{{asset('css/jquery.bxslider.css')}}" rel="stylesheet">
    @include('users.style')
@endsection
@section('content')
    <div class="hidden-sm col-lg-2 hidden-xs hidden-md">
        @include('users.left')
    </div>
    <div class="col-sm-10 col-xs-10 " id="main_profile_block">
        <div class="col-sm-12 col-xs-12" style="margin-bottom: 30px;">
            <div class="col-sm-4 col-xs-12">
                <div class="w3-center">
                    @if(!empty($user->profile->photo_id) && !empty($user->profile->photo->path))
                        <img height="200" style="border-radius: 20px;"
                             src="{{$user->profile->photo->path }}"
                             class="image-responsive" alt="">
                    @else
                        <div style='border-radius: 20px;'>
                            <p  id='add_image' class='w3-hover-opacity' style="height:200px;background-repeat: no-repeat;background-size: 250px 250px;background-image:url('{{"/images/includes/noImage.jpg"}}')">
                                @if($user->id==Auth::id() || Auth::user()->role_id=='1')
                                    <a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/users/'.Auth::id()."/edit/image")}}" style='height:100%;text-decoration:none;'>
                                        <i id='add_image_icon' style='position:relative;top:100px;display:none;font-size:30px;color:gray;' class=" fa fa-plus-circle" aria-hidden="true"></i></a>
                                @endif
                            </p>
                        </div>
                    @endif
                </div>





            </div>
            <div class="col-sm-8 col-xs-12">
                <p><h1 class="w3-text-green">{{$user->name}} {{$user->profile->lastname?$user->profile->lastname:""}}</h1></p>
                <p class="w3-text-green w3-center w3-small">Joined {{$user->created_at->diffForHumans()}}</p>
                <p class="w3-text-left "><span class="w3-text-green">@lang('messages.country'):</span> {{!empty($user->profile->country)?$user->profile->country:"-//-"}}</p>
                <p class="w3-text-left "><span class="w3-text-green">@lang('messages.city'):</span> {{!empty($user->profile->city)?$user->profile->city:"-//-"}}</p>
                <p class="w3-text-left "><span class="w3-text-green">@lang('messages.birthdate'):</span> {{!empty($user->profile->birthdate)?$user->profile->birthdate:"-//-"}}</p>
                <p class="w3-text-left "><span class="w3-text-green">@lang('messages.user_email'):</span> {{!empty($user->email)?$user->email:"-//-"}}</p>
            </div>
        </div>
        <div class="col-sm-12 col-xs-12">

            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" class="trig1" role="tab"
                                                          data-toggle="tab">@lang_u('messages.books')</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" class="trig2" role="tab"
                                           data-toggle="tab">@lang_u('messages.movies')</a>
                </li>
            </ul>
            <div class="tab-content">

                <div role="tabpanel" class="tab-pane active" id="home">
                    @include('users.books_nav')
                </div>
                <div role="tabpanel" class="tab-pane " id="profile">
                    @include('users.movies_nav')
                </div>
            </div>
        </div>
@if($blnBooksFromThisYear)
        <div class="col-sm-12 col-xs-12">
            <div class="w3-center">
                <h2>@lang('messages.books_imported_this_year')</h2>
            </div>
            <div class="col-sm-5 col-sm-offset-1 col-xs-12">
                <div id="user_diagram">
                </div>
            </div>
        </div>
    </div>
@endif

@endsection
@section('scripts')
    <script>

        //-- Get array of monthes from
        var strMonth = "@php echo implode(',', $arrMonthNames); @endphp";
        var arrMonth = strMonth.split(',');


        function returnHeightAndWidth() {
            var intHeight;
            var intWidth;
            //alert($(window).width());
            if ($(window).width() < 1200 && $(window).width() > 540) {

                intHeight = 300;
                intWidth = 460;
                $('#books_slider_block').css('display', 'none');
                $('#books_simple_block').css('display', 'block');
                $('#movies_slider_block').css('display', 'none');
                $('#movies_simple_block').css('display', 'block');

            } else if ($(window).width() < 1200 && $(window).width() < 540) {
                intHeight = 200;
                intWidth = 360;
                $('#books_slider_block').css('display', 'none');
                $('#books_simple_block').css('display', 'block');
                $('#movies_slider_block').css('display', 'none');
                $('#movies_simple_block').css('display', 'block');
            }
            else if ($(window).width() > 1200) {
                intHeight = 400;
                intWidth = 660;
                $('#books_slider_block').css('display', 'block');
                $('#books_simple_block').css('display', 'none');
                $('#movies_slider_block').css('display', 'block');
                $('#movies_simple_block').css('display', 'none');
            }

            var arrResult = {intHeight: intHeight, intWidth: intWidth};
            return arrResult;
        }

        var arrHeightAndWidth = returnHeightAndWidth();
        ResizeDiagram(arrHeightAndWidth);


        $(window).resize(function () {
            var arrHeightAndWidth = returnHeightAndWidth();
            ResizeDiagram(arrHeightAndWidth);
        });


        function ResizeDiagram(arrHeightAndWidth) {
            $("#user_diagram").html("");
            var margin = {top: 40, right: 20, bottom: 30, left: 40},
                width = arrHeightAndWidth['intWidth'] - margin.left - margin.right,
                height = arrHeightAndWidth['intHeight'] - margin.top - margin.bottom;

            var formatPercent = d3.format(".0%");

            var x = d3.scale.ordinal()
                .rangeRoundBands([0, width], .1);

            var y = d3.scale.linear()
                .range([height, 0]);

            var xAxis = d3.svg.axis()
                .scale(x)
                .orient("bottom");

            var yAxis = d3.svg.axis()
                .scale(y)
                .orient("left")
                .tickFormat(formatPercent);

            var tip = d3.tip()
                .attr('class', 'd3-tip')
                .offset([-10, 0])
                .html(function (d) {
                    return "<strong>Quantity:</strong> <span style='color:green'>" + (+(d.frequency) * 100) +
                        "<br><br></span><strong>Percentage:</strong> <span style='color:red'>" + (+(d.frequency) * 100) + " %</span>" +
                        "<br><br><strong>Month:</strong> <span style='color:blue'>" + (arrMonth[(+(d.letter) - 1)]) + "</span>";
                })

            var svg = d3.select("#user_diagram").append("svg")
                .attr("width", width + margin.left + margin.right)
                .attr("height", height + margin.top + margin.bottom)
                .append("g")
                .attr("transform", "translate(" + margin.left + "," + margin.top + ")");
            svg.call(tip);

            d3.tsv("{{env('PUBLIC_FULL_PATH')}}/files/tsv/user_books/user_{{$user->id}}.tsv", type, function (error, data) {
                x.domain(data.map(function (d) {
                    return d.letter;
                }));
                y.domain([0, d3.max(data, function (d) {
                    return d.frequency;
                })]);

                svg.append("g")
                    .attr("class", "x axis")
                    .attr("transform", "translate(0," + height + ")")
                    .call(xAxis);

                svg.append("g")
                    .attr("class", "y axis")
                    .call(yAxis)
                    .append("text")
                    .attr("transform", "rotate(-90)")
                    .attr("y", 6)
                    .attr("dy", ".71em")
                    .style("text-anchor", "end")
                    .text("Percentage");

                svg.selectAll(".bar")
                    .data(data)
                    .enter().append("rect")
                    .attr("class", "bar")
                    .attr("x", function (d) {
                        return x(d.letter);
                    })
                    .attr("width", x.rangeBand())
                    .attr("y", function (d) {
                        return y(d.frequency);
                    })
                    .attr("height", function (d) {
                        return height - y(d.frequency);
                    })
                    .on('mouseover', tip.show)
                    .on('mouseout', tip.hide)

            });

            function type(d) {
                d.frequency = +d.frequency;
                return d;
            }

        }

    </script>
    <script>

        // //-- Hide slider dots in case less than 4 images
        // var elements = document.getElementsByClassName('bx-pager-link');
        // if (elements.length > 4) {
        //     for (var i in elements) {
        //         if (elements.hasOwnProperty(i)) {
        //             elements[i].style.display = 'none';
        //         }
        //     }
        // }

        //-- Change link text color on hover
        $( '#user_left p' ).mouseover(function() {
            $(this).find('a').css('color','white');
        }).mouseleave(function() {
            $(this).find('a').css('color','#4CAF50');
        });

    </script>
    <script>
        $(document).ready(function(){
            $("#add_image").hover(function(){
                    $("#add_image_icon").css('display','inline');
                },function(){
                    $("#add_image_icon").css('display','none');
                }
            );
        });
    </script>
    <script src="{{asset('js/jquery.bxslider.js')}}" type="text/javascript"></script>
    <script>

        //-- Functionality to display TWO bxsliders on one page (in Bootsarap tabs)

        var bx1 = $('.bxslider1').bxSlider({
            auto: true,
                controls:true,
                minSlides: 4,
                maxSlides: 4,
                slideWidth: 468,
                slideMargin: 20
        });

        var bx2 = $('.bxslider2').bxSlider({
            auto: true,
            controls:true,
            minSlides: 4,
            maxSlides: 4,
            slideWidth: 468,
            slideMargin: 20
        });

        $('a.trig1').on('click', function(e) {
            e.preventDefault();
            setTimeout(function() {
                bx1.redrawSlider();
            }, 0);
        });

        $('a.trig2').on('click', function(e) {
            e.preventDefault();
            setTimeout(function() {
                bx2.redrawSlider();
            }, 0);
        });

    </script>
@endsection