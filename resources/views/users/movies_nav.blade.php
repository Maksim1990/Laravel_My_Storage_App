<div class="col-sm-12" id="movies_slider_block" style="display: none;">
    @if(count($user->movies)>0)
    <div class="bxslider2">
            @foreach($user->movies as $movie)
                <div style="display: inline-block;padding-left: 30px;" class="w3-center">
                    @if(count($movie->photos)>0)
                        @php $countImage=0; @endphp
                        @foreach($movie->photos as $key=>$item)

                            <a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/movies/'.$movie->id)}}" >
                                @if($countImage<1)

                                    <img style="border-radius: 30px;" width="160" height="160"
                                         src="{{$item->photo->path}}"
                                         alt="">
                                    <br><span>{{$movie->title}}</span>
                                @endif

                                @php $countImage+=1; @endphp

                            </a>
                        @endforeach
                    @else
                        <a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/movies/'.$movie->id)}}">
                            <img style="border-radius: 30px;" width="160" height="160"
                                 src="/images/includes/noImage.jpg"
                                 alt="">
                            <br><span>{{$movie->title}}</span>
                        </a>

                    @endif
                </div>
            @endforeach
    </div>
        @else
            <h3 class="w3-text-green">@lang('messages.nothing_found')</h3>
        @endif

</div>
<div id="movies_simple_block" class="col-sm-12 col-xs-12" style="display: none;">
    @if(count($user->movies)>0)
        @foreach($user->movies as $movie)
            <div class="col-sm-6 col-md-4 col-xs-12 w3-center" id="simple_image">
                @if(count($movie->photos)>0)
                    @php $countImage=0; @endphp
                    @foreach($movie->photos as $key=>$item)

                        <a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/movies/'.$movie->id)}}">
                            @if($countImage<1)

                                <img style="border-radius: 30px;" width="160" height="160"
                                     src="{{$item->photo->path}}"
                                     alt="">
                                <br><span>{{$movie->title}}</span>
                            @endif

                            @php $countImage+=1; @endphp

                        </a>
                    @endforeach
                @else
                    <a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/movies/'.$movie->id)}}">
                        <img style="border-radius: 30px;"
                             src="/images/includes/noImage.jpg"
                             alt="">
                        <br><span>{{$movie->title}}</span>
                    </a>

                @endif
            </div>
        @endforeach
    @else
        <h3 class="w3-text-green">@lang('messages.nothing_found')</h3>
    @endif

</div>