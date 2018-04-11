<!-- Modal that pops up when you click on "About application" -->
<div id="id01" class="w3-modal" style="z-index:1000">
    <div class="w3-modal-content w3-animate-zoom">
        <div class="w3-container w3-padding w3-green">
            <h2 class="text-uppercase">@lang('messages.about_application')</h2>
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
                <a class="w3-button w3-green" onclick="document.getElementById('id01').style.display='none'">@lang('messages.cancel') </a>
           </div>
        </div>
    </div>
</div>

<!-- Modal that pops up when you click on "For developers" -->
<div id="id02" class="w3-modal" style="z-index:1000">
    <div class="w3-modal-content w3-animate-zoom">
        <div class="w3-container w3-padding w3-green">
            <h2 class="text-uppercase">@lang('messages.for_developers')</h2>
        </div>
        <div class="w3-panel">
            <div class="w3-section">
                <div class="w3-left-align" style="margin-bottom: 40px;">
                    <h2>@lang('messages.welcome_to_my')!</h2>
                    <hr>
                    <p><i class="fas fa-circle w3-text-green"></i>  Core application functionality is based on <strong>Laravel 5.5</strong></p>
                    <p><i class="fas fa-circle w3-text-green"></i>  Main database is <strong>MySQL</strong></p>
                    <p><i class="fas fa-circle w3-text-green"></i>  Caching functionality is implemented by using <strong>Redis</strong> (Redis Lab Cloud database)</p>
                    <p><i class="fas fa-circle w3-text-green"></i>  Searching functionality is implemented by using <strong>Laravel Scout</strong> & <strong>Algolia</strong> services</p>
                    <p><i class="fas fa-circle w3-text-green"></i>  Subscription functionality is implemented by using <strong>Laravel Cachier</strong> & <strong>Stripe API</strong> services</p>
                    <p><i class="fas fa-circle w3-text-green"></i> Additional authorization functionality is implemented by using <strong>Google API</strong> & <strong>GitHub API</strong> services</p>
                    <p><i class="fas fa-circle w3-text-green"></i> Queuing functionality is implemented by using <strong>Pusher</strong></p>
                    <p><i class="fas fa-circle w3-text-green"></i> Diagram & graph functionality is implemented by using <strong>D3 JS library</strong></p>
                </div>
                <a class="w3-button w3-green" onclick="document.getElementById('id02').style.display='none'">@lang('messages.cancel') </a>
            </div>
        </div>
    </div>
</div>


<!-- Modal that pops up when you click on "Contacts" -->
<div id="id03" class="w3-modal" style="z-index:1000">
    <div class="w3-modal-content w3-animate-zoom">
        <div class="w3-container w3-padding w3-green">
            <h2 class="text-uppercase">@lang('messages.contacts')</h2>
        </div>
        <div class="w3-panel">
            <div class="w3-section">
                <div class="w3-center">
                    <p style="font-size: 25px;font-weight:300;"><strong>Email : </strong> narushevich.maksim@gmail.com</p>
                    <p style="font-size: 25px;font-weight:300;"><strong>Web : </strong>  <a href="{{URL::to('http://web.discoveringworld.net/')}}">web.discoveringworld.net</a><br>
                        <a href="{{URL::to('http://www.discoveringworld.net/')}}">www.discoveringworld.net</a>
                    </p>
                    <p style="font-size: 25px;font-weight:300;"><strong>Mobile : </strong> +375(33) 627-20-17</p>
                    <p style="font-size: 25px;font-weight:300;"><strong>LinkedIn account : </strong> <a href="{{URL::to('https://www.linkedin.com/in/maksim-narushevich-b99783106/ ')}}">Maksim Narushevich</a></p>
                    <p style="font-size: 25px;font-weight:300;"><strong>LINE Messenger ID: </strong>maksimklim</p>
                    <p style="font-size: 25px;font-weight:300;"><strong>Skype ID: </strong>maksimn901</p>
                    <p style="font-size: 25px;font-weight:300;"><strong>VK account: </strong> <a href="{{URL::to('https://vk.com/maksim_naruschevich ')}}">Maksim Narushevich</a></p>
                    <p style="font-size: 25px;font-weight:300;"><strong>Facebook account: </strong> <a href="{{URL::to('https://www.facebook.com/Maksim1990 ')}}">Maksim Narushevich</a></p>
                    <p style="font-size: 25px;font-weight:300;"><strong>GitHub account: </strong> <a href="{{URL::to('https://github.com/Maksim1990 ')}}">Maksim1990</a></p>
             </div>
                <a class="w3-button w3-green" onclick="document.getElementById('id03').style.display='none'">@lang('messages.cancel') </a>
            </div>
        </div>
    </div>
</div>