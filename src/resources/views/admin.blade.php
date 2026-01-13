@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('header-extra')
    <form method="POST" action="/logout" style="display: inline;">
        @csrf
        <button type="submit" class="btn-logout">Logout</button>
    </form>
@endsection

@section('title','管理画面')

@section('content')
<div class="admin__content">
    <div class="admin__heading">
        <h2>Admin</h2>
    </div>

    <form action="/search" method="GET" class="search-form">
        <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ request('keyword') }}">
        <select name="gender">
            <option value="" disabled selected>性別</option>
            <option value="">全て</option>
            <option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option>
            <option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
            <option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>その他</option>
        </select>
        <select name="category_id">
            <option value="">お問い合わせの種類</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->content }}
                </option>
            @endforeach
        </select>
        <input type="date" name="date" value="{{ request('date') }}">
        <button type="submit">検索</button>
        <a class="reset-btn" href="/reset">リセット</a>
    </form>

    <div class="admin__actions">
        <a href="/export?{{ http_build_query(request()->query()) }}" class="export-btn">エクスポート</a>
        <div class="admin__pagination">
            @if ($contacts->lastPage() > 1)
                @if ($contacts->currentPage() > 1)
                    <a href="{{ $contacts->previousPageUrl() }}">&lt;</a>
                @endif

                @for ($i = 1; $i <= $contacts->lastPage(); $i++)
                    @if ($i == $contacts->currentPage())
                        <span class="current">{{ $i }}</span>
                    @else
                        <a href="{{ $contacts->url($i) }}">{{ $i }}</a>
                    @endif
                @endfor

                @if ($contacts->currentPage() < $contacts->lastPage())
                    <a href="{{ $contacts->nextPageUrl() }}">&gt;</a>
                @endif
            @endif
        </div>
    </div>

    <table class="admin__table">
        <thead>
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                <td>
                    @if ($contact->gender == 1)
                        男性
                    @elseif ($contact->gender == 2)
                        女性
                    @else
                        その他
                    @endif
                </td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->category->content }}</td>
                <td>
                    <button class="detail-btn" data-id="{{ $contact->id }}">詳細</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@foreach ($contacts as $contact)
<div class="modal" id="modal-{{ $contact->id }}">
    <div class="modal__content">
        <div class="modal__header">
            <button class="modal__close" data-id="{{ $contact->id }}">&times;</button>
        </div>
        <div class="modal__body">
            <table class="modal__table">
                <tr>
                    <th>お名前</th>
                    <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td>
                        @if ($contact->gender == 1)
                            男性
                        @elseif ($contact->gender == 2)
                            女性
                        @else
                            その他
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td>{{ $contact->email }}</td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td>{{ $contact->tel }}</td>
                </tr>
                <tr>
                    <th>住所</th>
                    <td>{{ $contact->address }}</td>
                </tr>
                <tr>
                    <th>建物名</th>
                    <td>{{ $contact->building }}</td>
                </tr>
                <tr>
                    <th>お問い合わせの種類</th>
                    <td>{{ $contact->category->content }}</td>
                </tr>
                <tr>
                    <th>お問い合わせ内容</th>
                    <td>{{ $contact->detail }}</td>
                </tr>
            </table>
        </div>
        <div class="modal__footer">
            <form action="/delete/{{ $contact->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-btn">削除</button>
            </form>
        </div>
    </div>
</div>
@endforeach

<script>
    document.querySelectorAll('.detail-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const id = btn.dataset.id;
            document.getElementById('modal-' + id).classList.add('show');
        });
    });

    document.querySelectorAll('.modal__close').forEach(btn => {
        btn.addEventListener('click', () => {
            const id = btn.dataset.id;
            document.getElementById('modal-' + id).classList.remove('show');
        });
    });

    document.querySelectorAll('.modal').forEach(modal => {
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.remove('show');
            }
        });
    });
</script>

@endsection