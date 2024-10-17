@extends('layouts.app')

@section('meta')
<meta name="description" content="Join DevNation today and become part of a vibrant community of developers, innovators, and leaders. Sign up to access exclusive resources, events, and more.">
<meta name="keywords" content="DevNation signup, developer community registration, DevNation membership">
<meta name="author" content="DevNation">
@endsection

@section('title', 'Sign up - DevNation')

@section('content')

<div class="signup-container">
    <div class="signup-card">
        <div class="signup-header">
            <h1 class="h3 mb-0">Join DevNation</h1>
            <p class="mb-0">Connect. Innovate. Code.</p>
        </div>
        <div class="signup-form">
            <form method="POST">
                @csrf
                <div class="form-group">
                    <i class="fas fa-user input-icon"></i>
                    <input type="text" class="form-control" style="padding-left:2rem;" id="name" name="name" required autofocus placeholder="Enter your Full Name">
                </div>
                <div class="form-group">
                    <i class="fas fa-envelope input-icon"></i>
                    <input type="email" class="form-control" style="padding-left:2rem;" id="email" name="email" required placeholder="Enter your Email Address">
                </div>
                <div class="form-group">
                    <i class="fas fa-lock input-icon"></i>
                    <input type="password" class="form-control" style="padding-left:2rem;" id="password" name="password" required placeholder="Create a Password">
                </div>
                <div class="form-group">
                    <i class="fas fa-lock input-icon"></i>
                    <input type="password" class="form-control" style="padding-left:2rem;" id="password_confirmation" name="password_confirmation" required placeholder="Confirm Password">
                </div>
                <div style="text-align:center;">
                   <button type="submit" class="btn btn-signup">Create Account</button> 
                </div>
            </form>
        </div>
        <div class="signup-footer">
            <p>Already have an account? <a href="#">Log in</a></p>
        </div>
    </div>
</div>
@endsection