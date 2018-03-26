<style>
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
        z-index: 1;
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

</style>