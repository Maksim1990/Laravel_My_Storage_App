@extends('layouts.admin')
@section('content')

    <div style="padding-top: 100px;" class="col-sm-10 col-sm-offset-1 col-lg-10 col-lg-offset-1">
        <div class="container">
           <div>
               <h3 class="w3-text-green">Successfully imported {{$intImported}} items</h3>
           </div>
            @if(count($arrError)>0)
            <div style="padding-top: 20px;" class="col-sm-10  col-lg-10">
                <table class="w3-table w3-striped w3-bordered w3-hoverable">
                    <tr>
                        <th>Line</th>
                        <th>Error type</th>
                    </tr>

                    @foreach($arrError as $key=>$val)
                        <tr>
                            <td>{{$key}}</td>
                            <td class="w3-text-red">{{$val}}</td>
                        </tr>
                    @endforeach
                </table>

            </div>
            @endif
        </div>
    </div>
@stop
@section('scripts')

@endsection

