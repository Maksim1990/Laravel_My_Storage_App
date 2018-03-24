@extends('layouts.admin')
@section ('styles')
    <style>

        #user_diagram {
            font: 10px sans-serif;
        }
        #main_profile_block{
            padding-top: 100px;
        }

        .axis path,
        .axis line {
            fill: none;
            stroke: #000;
            shape-rendering: crispEdges;
        }

        .bar {
            fill: green;
        }

        .bar:hover {
            fill: gray;
        }

        .x.axis path {
            display: none;
        }

        .d3-tip {
            line-height: 1;
            font-weight: bold;
            padding: 12px;
            background: rgba(0, 0, 0, 0.8);
            color: #fff;
            border-radius: 2px;
        }

        /* Creates a small triangle extender for the tooltip */
        .d3-tip:after {
            box-sizing: border-box;
            display: inline;
            font-size: 10px;
            width: 100%;
            line-height: 1;
            color: rgba(0, 0, 0, 0.8);
            content: "\25BC";
            position: absolute;
            text-align: center;
        }

        /* Style northward tooltips differently */
        .d3-tip.n:after {
            margin: -1px 0 0 0;
            top: 100%;
            left: 0;
        }
    </style>
@endsection
@section ('scripts_header')
    <script src="http://d3js.org/d3.v3.min.js"></script>
    <script src="http://labratrevenge.com/d3-tip/javascripts/d3.tip.v0.6.3.js"></script>

@endsection
@section('content')
    <div class="col-sm-12 col-xs-12 " id="main_profile_block">
        <div class="col-sm-12 col-xs-12">
        </div>
        <div class="col-sm-12 col-xs-12">
            <div class="w3-center">
                <h2>{{$user->name}}'s books for these year</h2>
            </div>
            <div class="col-sm-5 col-sm-offset-1 col-xs-12">
                <div id="user_diagram">
                </div>
            </div>
        </div>
    </div>


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
                intWidth = 560;
            } else if ($(window).width() < 1200 && $(window).width() < 540) {
                intHeight = 200;
                intWidth = 360;
            }
            else if ($(window).width() > 1200) {
                intHeight = 500;
                intWidth = 960;
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
@endsection