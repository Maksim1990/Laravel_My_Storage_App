<!-- Side Navigation -->
<nav class="w3-sidebar w3-bar-block w3-collapse w3-white w3-animate-left w3-card" style="z-index:3;width:320px;" id="mySidebar">
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom w3-large"><img src="https://www.w3schools.com/images/w3schools.png" style="width:60%;"></a>
    <a href="javascript:void(0)" onclick="w3_close()" title="Close Sidemenu"
       class="w3-bar-item w3-button w3-hide-large w3-large">Close <i class="fa fa-remove"></i></a>
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-dark-grey w3-button w3-hover-black w3-left-align" onclick="document.getElementById('id01').style.display='block'">New Message <i class="w3-padding fa fa-pencil"></i></a>
    <a id="Link1" onclick="myFunc('Link_block_1')" href="javascript:void(0)" class="w3-bar-item w3-button"><i class="fa fa-inbox w3-margin-right"></i>Inbox (3)<i class="fa fa-caret-down w3-margin-left"></i></a>
    <div id="Link_block_1" class="w3-hide w3-animate-left">
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey" onclick="openMail('Borge');w3_close();" id="firstTab">
            <div class="w3-container">
                <img class="w3-round w3-margin-right" src="/w3images/avatar3.png" style="width:15%;"><span class="w3-opacity w3-large">Borge Refsnes</span>
                <h6>Subject: Remember Me</h6>
                <p>Hello, i just wanted to let you know that i'll be home at...</p>
            </div>
        </a>
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey" onclick="openMail('Jane');w3_close();">
            <div class="w3-container">
                <img class="w3-round w3-margin-right" src="/w3images/avatar5.png" style="width:15%;"><span class="w3-opacity w3-large">Jane Doe</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
            </div>
        </a>
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey" onclick="openMail('John');w3_close();">
            <div class="w3-container">
                <img class="w3-round w3-margin-right" src="/w3images/avatar2.png" style="width:15%;"><span class="w3-opacity w3-large">John Doe</span>
                <p>Welcome!</p>
            </div>
        </a>
    </div>

    <a id="Link2" onclick="myFunc('Link_block_2')" href="javascript:void(0)" class="w3-bar-item w3-button"><i class="fa fa-inbox w3-margin-right"></i>Inbox (33)<i class="fa fa-caret-down w3-margin-left"></i></a>
    <div id="Link_block_2" class="w3-hide w3-animate-left">
        <a href="{{URL::to('books/create ')}}" class="w3-bar-item w3-button"><i class="fa fa-paper-plane w3-margin-right"></i>Add book</a></a>
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-hourglass-end w3-margin-right"></i>Add movie</a>
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-trash w3-margin-right"></i>Add sport event</a>
    </div>



    <a id="Link3" onclick="myFunc('Link_block_3')" href="javascript:void(0)" class="w3-bar-item w3-button"><i class="fa fa-inbox w3-margin-right"></i>Events<i class="fa fa-caret-down w3-margin-left"></i></a>
    <div id="Link_block_3" class="w3-hide w3-animate-left">
        <a href="{{URL::to('books/create ')}}" class="w3-bar-item w3-button"><i class="fa fa-paper-plane w3-margin-right"></i>Add book55</a></a>
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-hourglass-end w3-margin-right"></i>Add movie55</a>
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-trash w3-margin-right"></i>Add sport event55</a>
    </div>



</nav>