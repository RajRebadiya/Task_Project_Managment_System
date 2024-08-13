@extends('auth.layout.template')

@section('title', 'Forget Password')

@section('content')
    <!-- WRAPPER -->
    <div id="wrapper" class="theme-cyan">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle auth-main">
                <div class="auth-box">
                    <div class="top">
                        <img src="{{ url('assets/images/logo-white.svg') }}" alt="Iconic">
                    </div>
                    <div class="card">
                        <div class="header">
                            <p class="lead">Recover my password</p>
                        </div>
                        <div class="body">
                            <p>Please enter your email address below to receive instructions for resetting password.</p>
                            <form class="form-auth-small" action="index.html">
                                <div class="form-group">
                                    <input type="password" class="form-control" id="signup-password" placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">RESET PASSWORD</button>
                                <div class="bottom">
                                    <span class="helper-text">Know your password? <a
                                            href="{{ route('login_show') }}">Login</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->
@endsection
