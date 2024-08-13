@extends('auth.layout.template')

@section('title', 'Register')

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
                            <p class="lead">Create an account</p>
                        </div>
                        <div class="body">
                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <form class="form-auth-small" action={{ route('register') }} method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="signup-name" class="control-label sr-only">Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                        id="signup-name" placeholder="Your name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="signup-phone" class="control-label sr-only">Phone</label>
                                    <input type="number" name="phone" value="{{ old('phone') }}" class="form-control"
                                        id="signup-phone" placeholder="Your phone">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="signup-email" class="control-label sr-only">Email</label>
                                    <input type="email" name='email' value="{{ old('email') }}" class="form-control"
                                        id="signup-email" placeholder="Your email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="signup-password" class="control-label sr-only">Password</label>
                                    <input type="password" name='password' class="form-control" id="signup-password"
                                        placeholder="Password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">REGISTER</button>
                                <div class="bottom">
                                    <span class="helper-text">Already have an account? <a
                                            href="{{ route('login_show') }}">Login</a></span>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END WRAPPER -->
    @endsection
