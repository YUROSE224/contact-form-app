@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    @yield('auth-css')
@endsection

@section('content')
<div class="@yield('form-container-class')">
    <div class="@yield('heading-class')">
        <h2>@yield('form-title')</h2>
    </div>
    <form class="form" action="@yield('form-action')" method="POST" novalidate>
        @csrf
        @if ($errors->any())
        <div class="form__error">
            @foreach ($errors->all() as $error)
                <span class="form__error-item">{{ $error }}</span>
            @endforeach
        </div>
    @endif
        @yield('form-fields')
        <div class="form__button">
            <button class="form__button-submit" type="submit">@yield('submit-text')</button>
        </div>
    </form>
</div>
@endsection