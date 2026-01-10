@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('title','お問い合わせフォーム確認ページ')
@section('content')
<div class="confirm__content">
    <div class="confirm__heading">
        <h2>Confirm</h2>
    </div>
    <form class="form" action="/thanks" method="POST">
        @csrf
        <div class="confirm-table">
            <table class="confirm-table__inner">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__text name confirm-table__header--name">
                        <input type="text" name="last_name" value="{{ $contacts['last_name'] }}" readonly />
                        <input type="text" name="first_name" value="{{ $contacts['first_name'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__text">
                        <input type="text" name="gender" value="{{ \App\Models\Contact::GENDER_LABELS[$contacts['gender']] }}" readonly />
                        <input type="hidden" name="gender" value="{{ $contacts['gender'] }}">
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__text">
                        <input type="text" name="email" value="{{ $contacts['email'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__text">
                        <input type="text" name="tel" value=" {{ $contacts['phone1'] }}{{ $contacts['phone2'] }}{{ $contacts['phone3'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__text">
                        <input type="text" name="address" value="{{ $contacts['address'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__text">
                        <input type="text" name="building" value="{{ $contacts['building'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__text">
                    <input type="text" name="content" value="{{ $category->content }}" readonly />
                    <input type="hidden" name="category_id" value="{{ $contacts['category_id'] }}">
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ内容</th>
                    <td class="confirm-table__text">
                        <input type="text" name="detail" value="{{ $contacts['detail'] }}" readonly />
                    </td>
                </tr>
            </table>
        </div>
        <div class="confirm__buttons">
            <button class="confirm__button-submit" type="submit">送信</button>
            <button class="confirm__button-back" type="button" onclick="history.back()">修正</button>
        </div>
    </form>
</div>
@endsection