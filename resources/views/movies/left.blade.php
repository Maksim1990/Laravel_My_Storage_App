<div class="w3-center " id="user_left">
    <p><a href="{{URL::to('upload_images/'.$movie->id.'/2')}}">Upload multiple image</a></p>
    {{--<p><a href="#">Upload single image</a></p>--}}
    <p><a href="{{URL::to('movies/'.$movie->id."/edit")}}">Edit this book</a></p>
    <p><a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/movies/'.$movie->id."/edit/image")}}">Change movie main image</a></p>
    <p>
        {{ Form::open(['method' =>'DELETE' , 'action' => ['MovieController@destroy',$movie->id]])}}

        {!! Form::submit('Delete movie',['class'=>'btn btn-danger']) !!}

        {!! Form::close() !!}
    </p>



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
            <span id="rating_message" style="display:{{$blnDisplayRateMessage}};" class="w3-text-green">Thank you for voting!</span>
        </div>
        @if(count($ratings)>0)
            <div id="rating_statistics_block">
                <p id="rating_statistics_message" class="w3-text-green w3-center w3-tiny">
                    <span id="voteCount" class="w3-medium">{{$countRating}}</span> people already voted
                </p>
            </div>
        @endif

    </div>
</div>