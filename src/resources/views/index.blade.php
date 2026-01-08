@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('title','お問い合わせフォーム入力ページ')
@section('content')
<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Contact</h2>
    </div>
    <form class="form" action="">
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--name">
                    <input type="text" name="last_name" placeholder="例）山田">
                    <input type="text" name="first_name" placeholder="例）太郎">
                </div>
                <div class="form__error">
                <!-- バリデーションを後で追加 -->
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--radio">
                    <label>
                        <input class="form__radio" type="radio" name="gender" value="1">男性
                    </label>
                    <label>
                        <input class="form__radio" type="radio" name="gender" value="2">女性
                    </label>
                    <label>
                        <input class="form__radio" type="radio" name="gender" value="3">その他
                    </label>
                </div>
                <div class="form__error">
                <!-- バリデーションを後で追加 -->
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="email" name="email" placeholder="例）test@example.com">
                </div>
                <div class="form__error">
                <!-- バリデーションを後で追加 -->
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">電話番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--tel">
                    <input type="tel" name="phone1" placeholder="090">
                    <span class="form__hyphen">-</span>
                    <input type="tel" name="phone2" placeholder="1234">
                    <span class="form__hyphen">-</span>
                    <input type="tel" name="phone3" placeholder="5678">
                </div>
                <div class="form__error">
                <!-- バリデーションを後で追加 -->
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="address" placeholder="例）東京都渋谷区千駄ヶ谷1-2-3">
                </div>
                <div class="form__error">
                <!-- バリデーションを後で追加 -->
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="building" placeholder="例）千駄ヶ谷マンション101">
                </div>
                <div class="form__error">
                <!-- バリデーションを後で追加 -->
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの種類</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--select">
                    <select class="form__select" name="inquiry_type">
                        <option value="" disabled selected>選択してください</option>
                        <option value="1">商品のお届けについいて</option>
                        <option value="2">商品の交換について</option>
                        <option value="3">商品トラブル</option>
                        <option value="4">ショップへのお問い合わせ</option>
                        <option value="5">その他</option>
                    </select>
                </div>
                <div class="form__error">
                <!-- バリデーションを後で追加 -->
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせ内容</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--textarea">
                    <textarea name="inquiry_content" placeholder="お問い合わせ内容をご記入ください"></textarea>
                </div>
                <div class="form__error">
                <!-- バリデーションを後で追加 -->
                </div>
            </div>
        </div>
        <div class="form__button--area">
            <button class="form__button--submit" type="submit">確認画面</button>
        </div>
        </form>
</div>
@endsection