@extends('layouts.app')

@section('title', 'Register — Simple CRUD')

@section('content')
<div class="auth-wrap">
    <div class="card">
        <div class="header-row">
            <h1>Daftar Akun</h1>
        </div>

        @if ($errors->any())
            <div class="alert-error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ url('/register') }}">
            @csrf

            <div class="field">
                <label for="name">Nama</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
            </div>

            <div class="field">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
            </div>

            <div class="field">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%;">Daftar</button>
        </form>

        <p class="muted" style="margin: 14px 0 0; text-align: center;">
            Sudah punya akun? <a href="{{ route('login') }}">Login</a>
        </p>
    </div>
</div>
@endsection
