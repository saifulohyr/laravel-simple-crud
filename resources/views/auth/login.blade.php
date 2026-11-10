@extends('layouts.app')

@section('title', 'Login — Simple CRUD')

@section('content')
<div class="auth-wrap">
    <div class="card">
        <div class="header-row">
            <h1>Login</h1>
        </div>

        @if ($errors->any())
            <div class="alert-error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ url('/login') }}">
            @csrf

            <div class="field">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
            </div>

            <div class="field" style="display: flex; align-items: center; gap: 6px;">
                <input id="remember" type="checkbox" name="remember" value="1" style="width: auto;">
                <label for="remember" style="margin: 0; font-weight: 400;">Ingat saya</label>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%;">Masuk</button>
        </form>

        <p class="muted" style="margin: 14px 0 0; text-align: center;">
            Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
        </p>
    </div>
</div>
@endsection
