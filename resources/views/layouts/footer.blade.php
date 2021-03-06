<a href="#head" onclick="document.getElementById('id02').style.display='block'" data-step="4" data-intro="@lang('messages.bottom_right_button_for_support_access')" data-position="top"><img
            src="{{asset('images/includes/for_developers.png')}}" width="65" id="fixedbutton" data-toggle="tooltip" title="@lang('messages.information_for_developers')" data-placement="left"></a>

{{--Check if user choose some action previously for tutorial showing--}}
@if(empty(Auth::user()->setting->show_tutorial) || Auth::user()->setting->show_tutorial=="skip")
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


        $('#Link1,#Link2, #Link3,#Link4').removeClass("w3-lime");

        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
            x.previousElementSibling.className += " w3-lime";
        } else {
            x.className = x.className.replace(" w3-show", "");
            x.previousElementSibling.className =
                x.previousElementSibling.className.replace(" w3-lime", "");
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


    $('#tutorial_yes,#tutorial_skip,#tutorial_never').click(function () {

        var show_tutorial = $(this).data('tutorial-action');
        if (show_tutorial) {
            @if(Auth::user()->role_id!=4)
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
            @else
            $('#fixed_tutorial_button').hide();
            if (show_tutorial !== "yes") {
                new Noty({
                    type: 'error',
                    layout: 'topRight',
                    text: '{{trans('messages.warning')}} {{trans('messages.on_testing_account_tutorial')}}'
                }).show();
            }
            @endif
        }

    });
</script>

<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>


