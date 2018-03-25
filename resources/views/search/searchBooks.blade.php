@extends('layouts.admin')
@section('content')
    <p>Instant Book searching</p>
    <ais-index app-id="{{ config('scout.algolia.id') }}"
               api-key="{{ env('ALGOLIA_SEARCH') }}"
               index-name="books">
        <ais-input placeholder="Search by name or title..."></ais-input>
        <ais-results>
            <template scope="{ result }">
                <div>

                    @php

                    @endphp
                    <a :href="'{{URL::to(LaravelLocalization::getCurrentLocale() .'/books')}}/' + result.id">
                    <h1>@{{ result.title }}</h1>

                    </a>
                    <ul>
                        <li>@{{ result.author }}</li>
                    </ul>
                </div>
            </template>
        </ais-results>
    </ais-index>

@endsection
@section('scripts')
    <script src="{{asset('js/app.js')}}"></script>
@endsection
