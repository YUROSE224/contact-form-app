@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('header-extra')
    <a href="/register" class="btn-register">Register</a>
@endsection

@section('title','ログイン')

@section('content')
<div class="login-form__content">
    <div class="login-form__heading">
        <h2>Login</h2>
    </div>
    <form class="form" action="/login" method="POST">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
            </div>
            <div class="form__group-content">
                <input type="email" name="email" placeholder="例）test@example.com" value="{{ old('email') }}">
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
                <input type="password" name="password" placeholder="例）coachtech1106" value="{{ old('password') }}">
                <div class="form__error">
                @error('password')
                    <span class="form__error-item"> {{ $message }} </span>
                @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">ログイン</button>
        </div>
    </form>
@endsection