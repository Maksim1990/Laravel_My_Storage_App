@extends('layouts.admin_mini')
@section('styles')
    <style>
        * {
            box-sizing: border-box;
        }

        .columns {
            float: left;
            width: 33.3%;
            padding: 8px;
        }

        .price {
            list-style-type: none;
            border: 1px solid #eee;
            margin: 0;
            padding: 0;
            -webkit-transition: 0.3s;
            transition: 0.3s;
        }

        .price:hover {
            box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
        }

        .price .header {
            background-color: #111;
            color: white;
            font-size: 25px;
        }

        .price li {
            border-bottom: 1px solid #eee;
            padding: 20px;
            text-align: center;
        }

        .price .grey {
            background-color: #eee;
            font-size: 20px;
        }

        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 25px;
            text-align: center;
            text-decoration: none;
            font-size: 18px;
        }

        .w3-main{
            margin-left: 0px;
        }
        .span6{
            width: 100%;
        }
        .navbar{
            padding-right: 5%;
        }

        .main {
            min-height: 100%;
        }

        @media only screen and (max-width: 600px) {
            .columns {
                width: 100%;
            }
        }
    </style>
@endsection
@section('content')

    <div class="col-sm-8 col-sm-offset-2 col-lg-8 col-lg-offset-2 w3-center ">
        <h2 style="text-align:center">@lang('messages.choose_appropriate_plan')</h2>
        <p style="text-align:center">@lang('messages.plan_can_easily_be_changes')!</p>

        <div class="columns">
            <ul class="price">
                <li class="header">Free</li>
                <li class="grey">$ 0 / month</li>
                <li>10GB Storage</li>
                <li>10 Emails</li>
                <li>10 Domains</li>
                <li>1GB Bandwidth</li>
                <li class="grey">
                    {!! Form::open(['method'=>'POST','action'=>'SubscriptionController@store', 'files'=>true])!!}
                    {!! Form::hidden('stripe_plan', "free") !!}
                    <input type="submit" class="submit button" value="Sign Up">
                {!! Form::close() !!}
                </li>
            </ul>
        </div>

        <div class="columns">
            <ul class="price">
                <li class="header" style="background-color:#4CAF50">Basic</li>
                <li class="grey">$ 7 / month</li>
                <li>25GB Storage</li>
                <li>25 Emails</li>
                <li>25 Domains</li>
                <li>2GB Bandwidth</li>
                <li class="grey">
                    {!! Form::open(['method'=>'POST','action'=>'SubscriptionController@store', 'files'=>true])!!}
                    {!! Form::hidden('stripe_plan', "basic") !!}
                    <input type="submit" class="submit button" value="Sign Up">
                    {!! Form::close() !!}
                </li>
            </ul>
        </div>

        <div class="columns">
            <ul class="price">
                <li class="header">Business</li>
                <li class="grey">$ 15 / month</li>
                <li>50GB Storage</li>
                <li>50 Emails</li>
                <li>50 Domains</li>
                <li>5GB Bandwidth</li>
                <li class="grey">
                    {!! Form::open(['method'=>'POST','action'=>'SubscriptionController@store', 'files'=>true])!!}
                    {!! Form::hidden('stripe_plan', "business") !!}
                    <input type="submit" class="submit button" value="Sign Up">
                    {!! Form::close() !!}
                </li>
            </ul>
        </div>

    </div>
    <div class="col-sm-8 col-sm-offset-2 col-lg-8 col-lg-offset-2 w3-center ">
        <div class="alert alert-info" role="alert">
            <strong>INFO!</strong> Implemented subscription is based on <b>Laravel Cachier</b> and <b>Stripe</b> functionality
        </div>
    </div>


@endsection
@section('scripts')
    <script>
        $('#plans_hide_block,#menu_icon').hide();
    </script>
@endsection