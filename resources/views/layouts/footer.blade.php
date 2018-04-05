<a href="#head" data-step="4" data-intro="Use bottom right icon for instant support access" data-position="top"><img
            src="http://placehold.it/200x100" id="fixedbutton"></a>

{{--Check if user choose some action previously for tutorial showing--}}
@if(empty(Auth::user()->setting->show_tutorial))
<div id="fixed_tutorial_button">
    <p>@lang('messages.first_time_here')</p>
    <p>@lang('messages.want_to_go_through_tutorial')</p>
    <a class="btn btn-success btn-small" href="javascript:void(0);"
       onclick="javascript:introJs().setOption('showProgress', true).start();" id="tutorial_yes"
       data-tutorial-action="yes">@lang('messages.yes')</a>
    <button class="btn btn-default btn-small" id="tutorial_skip" data-tutorial-action="skip">@lang('messages.skip')</button>
    <button class="btn btn-success " style="background-color: black;" id="tutorial_never" data-tutorial-action="no">
        @lang('messages.dont_show_it')
    </button>
</div>
@endif
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

        //-- Close all other menu links
        var arrLinks=['Link_block_1','Link_block_2','Link_block_3','Link_block_4'];
        var index = arrLinks.indexOf(id);
        if (index >= 0) {
            arrLinks.splice( index, 1 );
        }
        for(var i=0;i<arrLinks.length;i++){
         $('#'+arrLinks[i]).removeClass("w3-show");
        }


        $('#Link1,#Link2, #Link3,#Link4').removeClass("w3-green");

        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
            x.previousElementSibling.className += " w3-green";
        } else {
            x.className = x.className.replace(" w3-show", "");
            x.previousElementSibling.className =
                x.previousElementSibling.className.replace(" w3-green", "");
        }
    }


    $(document).ready(function () {
        if ($(window).width() < 960) {
            $('#menu_icon').css('display', 'block');
            $('#current_plan_link').css('display', 'none');
        }
        else {
            $('#menu_icon').css('display', 'none');
            $('#current_plan_link').css('display', 'inline-block');
        }
    });

    $(window).resize(function () {
        if ($(window).width() < 960) {
            $('#menu_icon').css('display', 'block');
            $('#current_plan_link').css('display', 'none');
        }
        else {
            $('#menu_icon').css('display', 'none');
            $('#current_plan_link').css('display', 'inline-block');
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
    $('#main_left p').mouseover(function () {
        $(this).find('a').css('color', 'white');
    }).mouseleave(function () {
        $(this).find('a').css('color', '#4CAF50');
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

    .introjs-helperNumberLayer, .introjs-progressbar {
        background: green;
        margin-left: 30px;
        margin-top: 20px;
    }

    .introjs-helperLayer {
        opacity: 0.2;
    }

    .introjs-tooltiptext {
        padding-left: 30px;
    }
</style>

{{--//-- Intro JS block--}}
<script src="{{asset('js/intro.js')}}" type="text/javascript"></script>
<script>
    var token = '{{\Illuminate\Support\Facades\Session::token()}}'
    var urlTutorial = '{{ URL::to('show_tutorial_ajax') }}';

    $('.introjs-skipbutton').click(function () {
        alert("Test");
    });

    $('#tutorial_yes,#tutorial_skip,#tutorial_never').click(function () {

        var show_tutorial = $(this).data('tutorial-action');
        if (show_tutorial) {
            $.ajax({
                method: 'POST',
                url: urlTutorial,
                dataType: "json",
                data: {
                    show_tutorial: show_tutorial,
                    _token: token
                },
                async: true,
                success: function (data) {
                    if (data['status']) {

                        $('#fixed_tutorial_button').hide();
                        var strTutorial = "";
                        if (show_tutorial == 'no') {
                            strTutorial = "@lang('messages.notification_will_not_be_shown')";
                        } else if (show_tutorial == 'skip') {
                            strTutorial = "@lang('messages.notification_will_be_shown')";
                        }
                        if (strTutorial != "") {
                            new Noty({
                                type: 'success',
                                layout: 'topRight',
                                text: strTutorial
                            }).show();
                        }

                    }
                }
            });
        }

    });
</script>

