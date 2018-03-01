@extends('layouts.admin')
@section('content')
    <div>
        <p>Specific book</p>

    </div>

@stop
@section('scripts')
    <script>
        @if(Session::has('book_change'))
        new Noty({
            type: 'success',
            layout: 'topRight',
            text: '{{session('book_change')}}'
        }).show();
        @endif
    </script>
@endsection