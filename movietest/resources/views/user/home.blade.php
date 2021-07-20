@extends('layouts.app')

@section('content')

<head>
    <title>Open Pediatrics</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link rel="profile" href="#">

    <!--Google Font-->
    <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
    <!-- Mobile specific meta -->
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone-no">

    <!-- CSS files -->
    <link rel="stylesheet" href="main/css/plugins.css">
    <link rel="stylesheet" href="main/css/style.css">
</head>

<!--end of preloading-->


<div class="hero user-hero">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="hero-ct">
                    <h1>{{Auth::user()->name}}’s profile</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-single">
    <div class="container">
        <div class="row ipad-width">
            <div class="col-md-3 col-sm-12 col-xs-12">
            <br> <br> <br> <br> <br> <br><br> <br> <br>

                <div class="user-information">                   
                    <div class="user-fav">
                        <p>Account Details</p>
                        <ul>
                            <li class="active"><a href="/dashboard">Profile</a></li>
                            <li><a href="/watchlist">Watchlist</a></li>

                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="form-style-1 user-pro" action="#">
                    <form action="/user/changeuser" method="POST">
                    @csrf
                        <h4>Edit Profile</h4>
                        <div class="row">
                            <div class="col-md-6 form-it">
                                <label>name</label>
                                <input name="name" type="text" placeholder="{{Auth::user()->name}}">
                            </div>
                            <div class="col-md-6 form-it">
                                <label>Email Address</label>
                                <input name="email" type="text" placeholder="{{Auth::user()->email}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <input class="submit" type="submit" value="save">
                            </div>
                        </div>
                    </form>
                    <br><br>
                    <form action="/user/changepass" method="POST">
                    @csrf
                        <h4>02. Change password</h4>
                        <div class="row">
                            <div class="col-md-6 form-it">
                                <label>Old Password</label>
                                <input name="oldpass" type="password" placeholder="●●●●●●●●●●●●●">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-it">
                                <label>New Password</label>
                                <input name="newpass" type="password" placeholder="●●●●●●●●●●●●●">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-it">
                                <label>Confirm New Password</label>
                                <input name="confnewpass" type="password" placeholder="●●●●●●●●●●●●● ">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <input class="submit" type="submit" value="change">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="main/js/jquery.js"></script>
<script src="main/js/plugins.js"></script>
<script src="main/js/plugins2.js"></script>
<script src="main/js/custom.js"></script>
@endsection