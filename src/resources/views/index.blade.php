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
    <form class="form" action="/confirm" method="POST">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--name">
                    <input type="text" name="last_name" placeholder="例）山田" value="{{ old('last_name') }}">
                    <input type="text" name="first_name" placeholder="例）太郎" value="{{ old('first_name') }}">
                </div>
                <div class="form__error">
                @error('first_name')
                    <span class="form__error-item"> {{ $message }} </span>
                @enderror
                @error('last_name')
                    <span class="form__error-item"> {{ $message }} </span>
                @enderror
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
                        <input class="form__radio" type="radio" name="gender" value="1" {{ old('gender') == 1 ? 'checked' : '' }}>男性
                    </label>
                    <label>
                        <input class="form__radio" type="radio" name="gender" value="2" {{ old('gender') == 2 ? 'checked' : '' }}>女性
                    </label>
                    <label>
                        <input class="form__radio" type="radio" name="gender" value="3" {{ old('gender') == 3 ? 'checked' : '' }}>その他
                    </label>
                </div>
                <div class="form__error">
                @error('gender')
                    {{ $message }}
                @enderror
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
                    <input type="email" name="email" placeholder="例）test@example.com" value="{{ old('email') }}">
                </div>
                <div class="form__error">
                @error('email')
                    {{ $message }}
                @enderror
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
                    <input type="tel" name="phone1" placeholder="090" value="{{ old('phone1') }}">
                    <span class="form__hyphen">-</span>
                    <input type="tel" name="phone2" placeholder="1234" value="{{ old('phone2') }}">
                    <span class="form__hyphen">-</span>
                    <input type="tel" name="phone3" placeholder="5678" value="{{ old('phone3') }}">
                </div>
                <div class="form__error">
                    @if ($errors->has('phone1') || $errors->has('phone2') || $errors->has('phone3'))
                        {{ $errors->first('phone1') ?? $errors->first('phone2') ?? $errors->first('phone3') }}
                    @endif
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
                    <input type="text" name="address" placeholder="例）東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
                </div>
                <div class="form__error">
                @error('address')
                    {{ $message }}
                @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="building" placeholder="例）千駄ヶ谷マンション101" value="{{ old('building') }}">
                </div>
                <div class="form__error">
                @error('building')
                    {{ $message }}
                @enderror
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
                    <select class="form__select" name="content" value="{{ old('content') }}">
                        <option value="" disabled selected>選択してください</option>
                        <option value="1" {{ old('content') == '1' ? 'selected' : '' }}>商品のお届けについて</option>
                        <option value="2" {{ old('content') == '2' ? 'selected' : '' }}>商品の交換について</option>
                        <option value="3" {{ old('content') == '3' ? 'selected' : '' }}>商品トラブル</option>
                        <option value="4" {{ old('content') == '4' ? 'selected' : '' }}>ショップへのお問い合わせ</option>
                        <option value="5" {{ old('content') == '5' ? 'selected' : '' }}>その他</option>
                    </select>
                </div>
                <div class="form__error">
                @error('content')
                    {{ $message }}
                @enderror
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
                    <textarea name="detail" placeholder="お問い合わせ内容をご記入ください" >{{ old('detail') }}</textarea>
                </div>
                <div class="form__error">
                @error('detail')
                    {{ $message }}
                @enderror
                </div>
            </div>
        </div>
        <div class="form__button--area">
            <button class="form__button--submit" type="submit">確認画面</button>
        </div>
        </form>
</div>
@endsection