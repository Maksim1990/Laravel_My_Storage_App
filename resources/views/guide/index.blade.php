@extends('layouts.admin')
@section('styles')

@endsection
@section('content')

    <div class="container-narrow">

        <div class="masthead">
            <ul class="nav nav-pills pull-right" >
                <li><a href="https://github.com/usablica/intro.js/tags"><i class='icon-black icon-download-alt'></i> Download</a></li>
                <li><a href="https://github.com/usablica/intro.js">Github</a></li>
                <li><a href="https://twitter.com/usablica">@usablica</a></li>
            </ul>
            <h3 class="muted">Intro.js</h3>
        </div>

        <hr>

        <div class="jumbotron">

            <p class="lead" >This is the basic usage of IntroJs, with <code>data-step</code> and <code>data-intro</code> attributes.</p>
            <a class="btn btn-large btn-success" href="javascript:void(0);" onclick="javascript:introJs().setOption('showProgress', true).start();">Show me how</a>
        </div>

        <hr>

        <div class="row-fluid marketing">
            <div >
                <h4>Section One</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis augue a neque cursus ac blandit orci faucibus. Phasellus nec metus purus.</p>

                <h4>Section Two</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis augue a neque cursus ac blandit orci faucibus. Phasellus nec metus purus.</p>

                <h4>Section Three</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis augue a neque cursus ac blandit orci faucibus. Phasellus nec metus purus.</p>
            </div>

            <div >
                <h4>Section Four</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis augue a neque cursus ac blandit orci faucibus. Phasellus nec metus purus.</p>

                <h4>Section Five</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis augue a neque cursus ac blandit orci faucibus. Phasellus nec metus purus.</p>

                <h4>Section Six</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis augue a neque cursus ac blandit orci faucibus. Phasellus nec metus purus.</p>

            </div>
        </div>

        <hr>
    </div>

@endsection
@section('scripts')

@endsection