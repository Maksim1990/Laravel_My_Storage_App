@if(Auth::user()->role_id==4)
    <div class="alert alert-danger col-sm-12 col-lg-12" role="alert" style="margin-top: 30px;">
        <strong>@lang('messages.warning')</strong> @lang('messages.test_account')
    </div>
@endif