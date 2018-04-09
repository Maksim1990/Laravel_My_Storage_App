@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('messages.register')</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="form-group">

                                                           <label for="name" class="col-md-4 control-label">@lang('messages.login_with')</label>

                                                           <div class="col-md-6">

                                    {{--                               <a href="{{ url('login/facebook') }}" class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>--}}

                                    {{--                               <a href="{{ url('login/twitter') }}" class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>--}}
                                    <div class="col-md-6">
                                                                       <a href="{{ url('login/google') }}" class="btn btn-social-icon btn-google-plus"><img  height="55"
                                                                                                                                                             src="{{"/images/includes/google-logo.png"}}"
                                                                                                                                                             alt=""></a>
                                    </div>
                                    {{--                               <a href="{{ url('login/linkedin') }}" class="btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a>--}}
                                    <div class="col-md-6">
                                                                       <a href="{{ url('login/github') }}" class="btn btn-social-icon btn-github"><img  height="55"
                                                                                                                                                        src="{{"/images/includes/github_logo.png"}}"
                                                                                                                                                        alt=""></a>
                                    </div>
                                    {{--                               <a href="{{ url('login/bitbucket') }}" class="btn btn-social-icon btn-bitbucket"><i class="fa fa-bitbucket"></i></a>--}}

                                                               </div>

                                                       </div>


                              
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                                                           <label for="name" class="col-md-4 control-label">@lang('messages.name')</label>

                                                           
                                <div class="col-md-6">

                                                               @if(!empty($name))

                                                                       <input id="name" type="text" class="form-control"
                                                                              name="name" value="{{$name}}" required
                                                                              autofocus>

                                                                   @else

                                                                       <input id="name" type="text" class="form-control"
                                                                              name="name" value="{{ old('name') }}"
                                                                              required autofocus>

                                                                   @endif    

                                                                   @if ($errors->has('name'))

                                                                           <span class="help-block">

                                       <strong>{{ $errors->first('name') }}</strong>

                                   </span>

                                                                       @endif

                                                               
                                </div>

                                                       
                            </div>

                                                   
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                                           <label for="email" class="col-md-4 control-label">@lang('messages.user_email')</label>

                                                           
                                <div class="col-md-6">

                                                                   @if(!empty($email))

                                                                       <input id="email" type="email"
                                                                              class="form-control" name="email"
                                                                              value="{{$email}}" required>

                                                                       @else

                                                                       <input id="email" type="email"
                                                                              class="form-control" name="email"
                                                                              value="{{ old('email') }}" required>

                                                                       @endif

                                                                   @if ($errors->has('email'))

                                                                           <span class="help-block">

                                       <strong>{{ $errors->first('email') }}</strong>

                                   </span>

                                                                       @endif

                                                               
                                </div>

                                                       
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">@lang('messages.password')</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">@lang('messages.confirm_password')</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-success">
                                        @lang('messages.register')
                                    </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <p><a href="{{ route('login') }}">@lang('messages.login')</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
