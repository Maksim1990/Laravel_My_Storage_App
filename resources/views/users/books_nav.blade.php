<div class="col-sm-12" id="books_slider_block" style="display: none;">
    @if(count($user->books)>0)
    <div class="bxslider1">

            @foreach($user->books as $book)
                <div style="display: inline-block;padding-left: 30px;" class="w3-center">
                    @if(count($book->photos)>0)
                        @php $countImage=0; @endphp
                        @foreach($book->photos as $key=>$item)

                            <a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/books/'.$book->id)}}" >
                                @if($countImage<1)

                                    <img style="border-radius: 30px;" width="160" height="160"
                                         src="{{$item->photo->path}}"
                                         alt="">
                                    <br><span>{{$book->title}}</span>
                                @endif

                                @php $countImage+=1; @endphp

                            </a>
                        @endforeach
                    @else
                        <a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/books/'.$book->id)}}">
                            <img style="border-radius: 30px;" width="160" height="160"
                                 src="/images/includes/noImage.jpg"
                                 alt="">
                            <br><span>{{$book->title}}</span>
                        </a>

                    @endif
                </div>
            @endforeach
    </div>
                @else
            <h3 class="w3-text-green">@lang('messages.nothing_found')</h3>
        @endif

</div>
<div id="books_simple_block" class="col-sm-12 col-xs-12" style="display: none;">
        @if(count($user->books)>0)
            @foreach($user->books as $book)
            <div class="col-sm-6 col-md-4 col-xs-12 w3-center" id="simple_image">
                    @if(count($book->photos)>0)
                        @php $countImage=0; @endphp
                        @foreach($book->photos as $key=>$item)

                            <a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/books/'.$book->id)}}">
                                @if($countImage<1)

                                    <img style="border-radius: 30px;" width="160" height="160"
                                         src="{{$item->photo->path}}"
                                         alt="">
                                    <br><span>{{$book->title}}</span>
                                @endif

                                @php $countImage+=1; @endphp

                            </a>
                        @endforeach
                    @else
                        <a href="{{URL::to('/'.LaravelLocalization::getCurrentLocale().'/books/'.$book->id)}}">
                            <img style="border-radius: 30px;"
                                 src="/images/includes/noImage.jpg"
                                 alt="">
                            <br><span>{{$book->title}}</span>
                        </a>

                    @endif
            </div>
            @endforeach
    @else
        <h3 class="w3-text-green">@lang('messages.nothing_found')</h3>
    @endif

</div>