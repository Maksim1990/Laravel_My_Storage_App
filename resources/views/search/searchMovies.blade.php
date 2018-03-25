@extends('layouts.admin')
@section('content')
    <p>Instant Movie searching</p>
    <ais-index app-id="{{ config('scout.algolia.id') }}"
               api-key="{{ env('ALGOLIA_SEARCH') }}"
               index-name="movies">
        <ais-input placeholder="Search by title, description or author..."></ais-input>
        <ais-results>
            <template scope="{ result }">
                <div>

                    @php

                        @endphp
                    <a :href="'{{URL::to(LaravelLocalization::getCurrentLocale() .'/movies')}}/' + result.id">
                        <h1>@{{ result.title }}</h1>

                    </a>
                    <ul>
                        <li>Author: @{{ result.author }}<br>
                        Description: @{{ result.description }}
                        </li>
                    </ul>
                </div>
            </template>
        </ais-results>
    </ais-index>

@endsection
@section('scripts')
    <script src="{{asset('js/app.js')}}"></script>
@endsection
