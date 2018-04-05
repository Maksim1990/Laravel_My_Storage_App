@extends('layouts.admin')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-stars.css') }}">
    <style>
        .commentItem {
            background-color: darkseagreen;
            border-radius: 20px;
            padding: 10px 5px;
            margin-bottom: 10px;
        }
        .commentItem a{
            color:white;
        }

        .commentItem:hover {
            background-color: darkgray;
        }
        .form-control {
            height: 40px;
            margin-bottom: 50px;
        }
    </style>
@endsection
@section('content')
    <div class="col-sm-8 col-sm-offset-2 col-lg-8 col-lg-offset-2 w3-center " style="padding-top: 60px;">
        <h2 class="text-uppercase">Instant Book searching</h2>
    <ais-index app-id="{{ config('scout.algolia.id') }}"
               api-key="{{ env('ALGOLIA_SEARCH') }}"
               index-name="users">
        <ais-input class="form-control" placeholder="Search by name or email..."></ais-input>
        <div class="alert alert-success" role="alert" style="text-align:right;height: 100%; margin-bottom: 20px;">
            <span style="margin-right: 10%;font-size: 16px;">Searching functionality is realized by implementing <strong>Laravel Scout</strong> & <strong>Algolia</strong></span>
            <img  height="55"
                  src="{{"/images/includes/algolia-mark-blue.png"}}"
                  alt="">
        </div>
        <ais-results>
            <template scope="{ result }">
                <div class="commentItem">

                    @php

                    @endphp
                    <a :href="'{{URL::to(LaravelLocalization::getCurrentLocale() .'/users')}}/' + result.id">
                    <h1>@{{ result.name }}</h1>

                    </a>
                        <p>@{{ result.email }}</p>
                </div>
            </template>
        </ais-results>
    </ais-index>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('js/app.js')}}"></script>
@endsection
