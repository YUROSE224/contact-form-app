@extends('layouts.auth')

@section('auth-css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('header-extra')
    <a href="/register" class="btn-register">Register</a>
@endsection

@section('title', 'ログイン')
@section('form-container-class', 'login-form__content')
@section('heading-class', 'login-form__heading')
@section('form-title', 'Login')
@section('form-action', '/login')
@section('submit-text', 'ログイン')

@section('form-fields')
    <div class="form__group">
        <div class="form__group-title">
            <span class="form__label--item">メールアドレス</span>
        </div>
        <div class="form__group-content">
            <input type="text" name="email" placeholder="例）test@example.com" value="{{ old('email') }}">
            <div class="form__error">
            @error('email')
                <span class="form__error-item"> {{ $message }} </span>
            @enderror
            </div>
        </div>
    </div>
    <div class="form__group">
        <div class="form__group-title">
            <span class="form__label--item">パスワード</span>
        </div>
        <div class="form__group-content">
            <input type="password" name="password" placeholder="例）coachtech1106">
            <div class="form__error">
            @error('password')
                <span class="form__error-item"> {{ $message }} </span>
            @enderror
            </div>
        </div>
    </div>
@endsection