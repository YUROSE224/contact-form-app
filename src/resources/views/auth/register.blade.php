@extends('layouts.auth')

@section('auth-css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('header-extra')
    <a href="/login" class="btn-login">Login</a>
@endsection

@section('title', 'ユーザー登録')
@section('form-container-class', 'register-form__content')
@section('heading-class', 'register-form__heading')
@section('form-title', 'Register')
@section('form-action', '/register')
@section('submit-text', '登録')

@section('form-fields')
    <div class="form__group">
        <div class="form__group-title">
            <span class="form__label--item">お名前</span>
        </div>
        <div class="form__group-content">
            <input type="text" name="name" placeholder="例）山田 太郎" value="{{ old('name') }}">
            <div class="form__error">
            @error('name')
                <span class="form__error-item"> {{ $message }} </span>
            @enderror
            </div>
        </div>
    </div>
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
            <input type="password" name="password" placeholder="例）coachtech1106">
            <div class="form__error">
            @error('password')
                <span class="form__error-item"> {{ $message }} </span>
            @enderror
            </div>
        </div>
    </div>
@endsection