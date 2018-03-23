@extends('layouts.admin')
@section ('styles')
<style>
    body {
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        width: 960px;
        height: 500px;
        position: relative;
    }
    path.slice{
        stroke-width:2px;
    }
    polyline{
        opacity: .3;
        stroke: black;
        stroke-width: 2px;
        fill: none;
    }
    svg text.percent{
        fill:white;
        text-anchor:middle;
        font-size:12px;
    }
</style>
@endsection
@section ('scripts_header')
    <script src="http://d3js.org/d3.v3.min.js"></script>
    <script src="{{asset('js/Donut3D.js')}}" type="text/javascript"></script>
@endsection
@section ('content')
    <div>
        <p>User statistics</p>
        <div id="info"></div>
        <button onClick="changeData()">Change Data</button>
    </div>

@stop

@section ('scripts')
    <script>

        var salesData=[
            {label:"Basic", color:"black",value:"5"},
            {label:"Plus", color:"#DC3912",value:"10"},
            {label:"Lite", color:"#FF9900",value:"15"},
            {label:"Elite", color:"#109618",value:"20"},
            {label:"Delux", color:"#990099",value:"50"}
        ];

        var svg = d3.select("#info").append("svg").attr("width",700).attr("height",300);

        svg.append("g").attr("id","salesDonut");
        svg.append("g").attr("id","quotesDonut");

        Donut3D.draw("salesDonut", randomData(), 150, 150, 130, 100, 30, 0.4);
        Donut3D.draw("quotesDonut", randomData(), 450, 150, 130, 100, 30, 0);

        function changeData(){
            Donut3D.transition("salesDonut", randomData(), 130, 100, 30, 0.4);
            Donut3D.transition("quotesDonut", randomData(), 130, 100, 30, 0);
        }

        function randomData(){
            return salesData.map(function(d){
                return {label:d.label, value:d.value, color:d.color};});
        }
    </script>
@endsection