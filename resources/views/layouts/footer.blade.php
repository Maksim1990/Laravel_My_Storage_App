<a href="#head" data-step="4" data-intro="Use bottom right icon for instant support access" data-position="top"><img src="http://placehold.it/200x100" id="fixedbutton"></a>
<div id="fixed_tutorial_button">
    <p>First time here?</p>
    <p>Do you want to go through fast tutorial?</p>
<a class="btn btn-success btn-small" href="javascript:void(0);" onclick="javascript:introJs().setOption('showProgress', true).start();" id="tutorial_yes" >Yes</a>
<button class="btn btn-default btn-small" id="tutorial_skip">Skip</button>
<button class="btn btn-success " style="background-color: black;" id="tutorial_never">Don't show it</button>
</div>
<script>
    // var openInbox = document.getElementById("Link1");
    // openInbox.click();
    //
    // var openInbox2 = document.getElementById("Link2");
    // openInbox2.click();

    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("myOverlay").style.display = "block";
    }
    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("myOverlay").style.display = "none";
    }

    function myFunc(id) {
        var x = document.getElementById(id);
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
            x.previousElementSibling.className += " w3-red";
        } else {
            x.className = x.className.replace(" w3-show", "");
            x.previousElementSibling.className =
                x.previousElementSibling.className.replace(" w3-red", "");
        }
    }


    $(document).ready(function () {
        if ($(window).width() < 960) {
            $('#menu_icon').css('display','block');
            $('#current_plan_link').css('display','none');
        }
        else {
            $('#menu_icon').css('display','none');
            $('#current_plan_link').css('display','inline-block');
        }
    });

    $(window).resize(function () {
        if ($(window).width() < 960) {
            $('#menu_icon').css('display','block');
            $('#current_plan_link').css('display','none');
        }
        else {
            $('#menu_icon').css('display','none');
            $('#current_plan_link').css('display','inline-block');
        }
    });

    openMail("Borge")
    function openMail(personName) {
        var i;
        var x = document.getElementsByClassName("person");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x = document.getElementsByClassName("test");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" w3-light-grey", "");
        }
        document.getElementById(personName).style.display = "block";
        event.currentTarget.className += " w3-light-grey";
    }
</script>

<script>
    var openTab = document.getElementById("firstTab");
    openTab.click();

    //-- Change link text color on hover
    $( '#main_left p' ).mouseover(function() {
        $(this).find('a').css('color','white');
    }).mouseleave(function() {
        $(this).find('a').css('color','#4CAF50');
    });

</script>
<style>
    .span6 {
        width: 95%;
    }

    .span5 {
        position: fixed;
        top: 20px;
        left: 15px;
    }
    .introjs-helperNumberLayer,.introjs-progressbar{
        background: green;
        margin-left: 30px;
        margin-top: 20px;
    }
    .introjs-helperLayer{
        opacity: 0.2;
    }
    .introjs-tooltiptext{
        padding-left: 30px;
    }
</style>

{{--//-- Intro JS block--}}
<script src="{{asset('js/intro.js')}}" type="text/javascript"></script>
<script >
    // alert("Test");
    $('.introjs-skipbutton').click(function() {
        alert("Test");
    });

    $('#tutorial_yes,#tutorial_skip,#tutorial_never').click(function() {
        $('#fixed_tutorial_button').hide();
    });
</script>

