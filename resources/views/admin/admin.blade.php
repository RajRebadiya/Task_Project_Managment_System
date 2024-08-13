@extends('auth.layout.template')

@section('title', 'Login')
<style>
    .lead {
        margin: 0px 33%;
    }
</style>

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
                            <p class="lead">Admin Login</p>
                        </div>
                        <div class="body">
                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <form class="form-auth-small" action="{{ route('admin_login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="signin-email" class="control-label sr-only">Email</label>
                                    <input type="email" name="email" class="form-control" id="signin-email"
                                        value="{{ old('email') }}" placeholder="Email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    <input type="password" class="form-control" id="signin-password" name="password"
                                        placeholder="Password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->
@endsection
