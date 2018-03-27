<style>


    /* Start of diagramm block */
    #user_diagram {
        font: 10px sans-serif;
    }

    #main_profile_block {
        padding-top: 20px;
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

    /* DIRECTION CONTROLS (NEXT / PREV) */
    .bx-wrapper .bx-prev {
        left: -50px;
        border-radius: 15px;
    }
    .bx-wrapper .bx-prev:before{
        content:'';
        background: url(http://www.japonshop.com/css/img/flch-izq.gif) no-repeat center;
        width: 20px;
        height: 20px;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    .bx-wrapper .bx-next {
        right: -50px;
        border-radius: 15px;
    }

    .bx-wrapper .bx-next:before{
        content:'';
        background: url(http://www.japonshop.com/css/img/flch-der.gif) no-repeat center;
        width: 20px;
        height: 20px;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    .bx-wrapper .bx-controls-direction a {
        position: absolute;
        top: 50%;
        transform:translateY(-50%);
        outline: 0;
        width: 32px;
        height: 112px;
        text-indent: -9999px;
        z-index: 0;
        border: 1px solid #e6e6e6;
        background: -webkit-linear-gradient(#fcfcfc 0%, #ebebeb 100%);
        background: -moz-linear-gradient(#fcfcfc 0%, #ebebeb 100%);
        background: -o-linear-gradient(#fcfcfc 0%, #ebebeb 100%);
        background: linear-gradient(#fcfcfc 0%, #ebebeb 100%);
    }

    .bx-wrapper .bx-controls-direction a:hover{
        background: #ebebeb;
    }

    .bx-wrapper .bx-controls-direction a:hover:before{
        left:45%;
    }

    .bx-wrapper .bx-controls-direction a.bx-next:hover:before{
        left:55%;
    }


    .bx-wrapper .bx-controls-direction a.disabled {
        display: none;
    }

    #simple_image img{
        width: 100%;
        height: 100%;
    }

/* LEFT USER BLOCK*/
    #user_left {
        position: fixed;
    padding-top: 30px;
    padding-right: 30px;
        border-right: 1px solid rgba(0, 0, 0, .1);
        height: 1200px;

    }

    #user_left p{
        height: 30px;
        padding: 5px;
        border-bottom: 1px solid lightgray;
    }
    #user_left p:hover{
        background-color:lightgray;
    }


</style>