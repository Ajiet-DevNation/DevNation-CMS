@extends('layouts.app')

@section('meta')
<meta name="description" content="Join DevNation today and become part of a vibrant community of developers, innovators, and leaders. Sign up to access exclusive resources, events, and more.">
<meta name="keywords" content="DevNation signup, developer community registration, DevNation membership">
<meta name="author" content="DevNation">
@endsection

@section('title', 'login - DevNation')

@section('content')
<div class="hello">
@include('layouts.inlcudes.nav')

<div class="login-container">
    <div class="login-card">
        <div class="login-header">
            <h1 class="h3 mb-0">Welcome Back to DevNation!</h1>
            <p class="mb-0">Let's get you logged in</p>
        </div>
        <div class="login-form">
            <form method="POST">
                @csrf
                <div class="form-group">
                    <i class="fas fa-envelope input-icon"></i>
                    <input type="email" class="form-control" style="padding-left:2rem;" id="email" name="email" required placeholder="Enter your Email Address">
                </div>
                <div class="form-group">
                    <i class="fas fa-lock input-icon"></i>
                    <input type="password" class="form-control" style="padding-left:2rem;" id="password" name="password" required placeholder="Enter your Password">
                </div>
                <div style="text-align:center;">
                   <button type="submit" class="btn btn-login">Login</button> 
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection