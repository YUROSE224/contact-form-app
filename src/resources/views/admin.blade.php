@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('header-extra')
    <form method="POST" action="/logout" style="display: inline;">
        @csrf
        <button type="submit" class="btn-logout">Logout</button>
    </form>
@endsection

@section('title','管理画面')

@section('content')

