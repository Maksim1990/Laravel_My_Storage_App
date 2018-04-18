@extends('layouts.admin')
@section('content')

    <div style="padding-top: 100px;" class="col-sm-10 col-sm-offset-1 col-lg-10 col-lg-offset-1">
        <div>
            <h2>Export all books in available formats</h2>
        <a href="{{ URL::to('downloadExcel_books/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
        <a href="{{ URL::to('downloadExcel_books/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>
        </div>
        </div>
            {{--<a href="{{ URL::to('downloadExcel/csv') }}"><button class="btn btn-success">Download CSV</button></a>--}}

    <div style="padding-top: 100px;" class="col-sm-10 col-sm-offset-1 col-lg-10 col-lg-offset-1">
        <div class="alert alert-success" role="alert" style="height: 65px;">
            <span style="float:left;"><strong>Attention!</strong> For correct import use provided example template.</span>
            <a class="btn btn-success btn-small" style="float:right;" href="{{'/files/templates/import_books_template.xlsx'}}" download="import_books_template">Download template
            </a>
        </div>
        <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('/import_books') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="file" id="file1"  name="import_file" />
            <button class="btn btn-primary" id="import_button" disabled>Import File</button>
        </form>
        <div class="col-sm-10 col-sm-offset-1 w3-center" id="file_name" style="height: 60px;"></div>
    </div>
@stop
@section('scripts')
    <script>
        $("#file1").change(function () {

            var val = $(this).val();

            switch (val.substring(val.lastIndexOf('.') + 1).toLowerCase()) {
                case 'xlsx':
                    $('#file_name').html('File ' + val + ' is chosen');
                    $('#file_name').css('color', 'green');
                    $('#import_button').prop('disabled', false);
                    break;
                default:
                    $('#file_name').html("File format is not correct! Please try again.");
                    $('#file_name').css('color', 'red');
                    $('#import_button').prop('disabled', true);
                    break;
            }
        });
    </script>
@endsection

