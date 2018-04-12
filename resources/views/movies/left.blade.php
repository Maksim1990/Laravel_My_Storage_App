<div class="w3-center " id="user_left">
    @if($movie->user_id==Auth::id())
    <p><a href="{{URL::to('upload_images/'.$movie->id.'/2')}}">@lang('messages.upload_multiple_images')</a></p>
    {{--<p><a href="#">Upload single image</a></p>--}}
    <p><a href="{{URL::to('movies/'.$movie->id."/edit")}}">@lang('messages.edit')</a></p>
    <p><a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/movies/'.$movie->id."/edit/image")}}">@lang('messages.change_main_image')</a></p>
    <div>
        <a href="#" onclick="document.getElementById('id06').style.display='block'" class="btn btn-danger">
            @lang('messages.delete')
        </a>
    </div>
    @endif



    <div id="rating_block" class="col-sm-12">
        <div id="cirrentRating" class="w3-center">
            <span id="current_number">{{$currentRating}}</span>
        </div>

        @if(isset($blnAlreadyVoted) && $blnAlreadyVoted)
            @php
                $blnDisplayRateBlock='none';
                $blnDisplayRateMessage='block';
            @endphp
        @else
            @php
                $blnDisplayRateBlock='block';
                $blnDisplayRateMessage='none';
            @endphp
        @endif
        <div id="rating_main" style="display: {{$blnDisplayRateBlock}};" class="w3-center">
            <select id="ratingSelect" name="rating">
                <option class="vote" value="1">1</option>
                <option class="vote" value="2">2</option>
                <option class="vote" value="3">3</option>
                <option class="vote" value="4">4</option>
                <option class="vote" value="5">5</option>
            </select>
        </div>

        <div id="rating_message_block" class="w3-center">
            <span id="rating_message" style="display:{{$blnDisplayRateMessage}};" class="w3-text-green">@lang('messages.thank_you_for_voting')</span>
        </div>
        <div id="rating_statistics_block">
            <p id="rating_statistics_message" class="w3-text-green w3-center w3-tiny">
                @if(count($ratings)>0)
                    <a href="#" onclick="document.getElementById('id08').style.display='block'">
                        <span id="voteCount" class="w3-medium">{{$countRating}}</span> @lang('messages.people_already_voted')
                    </a>
                @endif
            </p>
        </div>
        @include('includes.advertise')
    </div>
</div>