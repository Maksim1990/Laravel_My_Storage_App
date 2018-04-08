<!-- Modal that pops up when you click on "About application" -->
<div id="id01" class="w3-modal" style="z-index:4">
    <div class="w3-modal-content w3-animate-zoom">
        <div class="w3-container w3-padding w3-green">
            <h2 class="text-uppercase">About application</h2>
        </div>
        <div class="w3-panel">
       <div class="w3-section">
           <div class="w3-center">
               <h1>@lang('messages.welcome_to_my')!</h1>
               <p>@lang('messages.modal_1'). </p>
               <p>@lang('messages.modal_2').</p>
               <p>@lang('messages.modal_3')!</p>
               <p>@lang('messages.modal_4')!</p>

               <p>@lang('messages.modal_5')! </p>

               <a class="btn btn-success btn-small" href="javascript:void(0);"
                  onclick="javascript:introJs().setOption('showProgress', true).start();document.getElementById('id01').style.display='none';">@lang('messages.want_to_go_through_tutorial') </a>
           </div>
                <a class="w3-button w3-green" onclick="document.getElementById('id01').style.display='none'">Cancel </a>
            </div>
        </div>
    </div>
</div>

<!-- Modal that pops up when you click on "For developers" -->
<div id="id02" class="w3-modal" style="z-index:4">
    <div class="w3-modal-content w3-animate-zoom">
        <div class="w3-container w3-padding w3-green">
            <h2 class="text-uppercase">For developers</h2>
        </div>
        <div class="w3-panel">
            <div class="w3-section">
                <div class="w3-center">
                    <h1>@lang('messages.welcome_to_my')!</h1>
                    <p>@lang('messages.modal_1'). </p>
                    <p>@lang('messages.modal_2').</p>
                    <p>@lang('messages.modal_3')!</p>
                    <p>@lang('messages.modal_4')!</p>

                    <p>@lang('messages.modal_5')! </p>

                    <a class="btn btn-success btn-small" href="javascript:void(0);"
                       onclick="javascript:introJs().setOption('showProgress', true).start();document.getElementById('id02').style.display='none';">@lang('messages.want_to_go_through_tutorial') </a>
                </div>
                <a class="w3-button w3-green" onclick="document.getElementById('id02').style.display='none'">Cancel </a>
            </div>
        </div>
    </div>
</div>


<!-- Modal that pops up when you click on "Contacts" -->
<div id="id03" class="w3-modal" style="z-index:4">
    <div class="w3-modal-content w3-animate-zoom">
        <div class="w3-container w3-padding w3-green">
            <h2 class="text-uppercase">Contacts</h2>
        </div>
        <div class="w3-panel">
            <div class="w3-section">
                <div class="w3-center">
                    <h1>@lang('messages.welcome_to_my')!</h1>
                    <p>@lang('messages.modal_1'). </p>
                    <p>@lang('messages.modal_2').</p>
                    <p>@lang('messages.modal_3')!</p>
                    <p>@lang('messages.modal_4')!</p>

                    <p>@lang('messages.modal_5')! </p>

                    <a class="btn btn-success btn-small" href="javascript:void(0);"
                       onclick="javascript:introJs().setOption('showProgress', true).start();document.getElementById('id03').style.display='none';">@lang('messages.want_to_go_through_tutorial') </a>
                </div>
                <a class="w3-button w3-green" onclick="document.getElementById('id03').style.display='none'">Cancel </a>
            </div>
        </div>
    </div>
</div>