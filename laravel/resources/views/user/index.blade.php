@extends('layouts.parent')
@section('title', 'ECIS | ユーザー一覧')
@section('pageCss')
<link href="{{ asset('/css/admin.css') }}" rel="stylesheet">
@endsection
@section('content')
<h2>ユーザー一覧</h2><br>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>名前</th>
            <th>メールアドレス</th>
            <th>区分</th>
            <th>施設名</th>
            <th><br></th>
        </tr>
        @foreach($users as $user)
        <tr>
            <th>{{ $user->id }}</th>
            <th>{{ $user->name }}</th>
            <th>{{ $user->email }}</th>
            <th>
                @if($user->user_type == 1)
                介護
                @elseif($user->user_type == 2)
                行政
                @elseif($user->user_type == 3)
                管理
                @endif
            </th>
            <th>
                @if($user->user_type == 1)
                {{ $user->facility->name ?? '未登録' }}
                @endif
            </th>
            <th>
                <a href="{{ route('user.edit', ['user' => $user->id ]) }}" class="btn btn-primary">編集</a>
                <form action="{{ route('user.destroy', ['user' => $user->id]) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="delete">
                    <button type="submit" class="btn btn-danger">削除</button>
                </form>
                @if($user->user_type == 1 && !$user->facility_id)
                    <a href="{{ route('register_facility', ['user_id' => $user->id]) }}" class="btn btn-success">施設登録</a>
                @endif
            </th>
        </tr>
        @endforeach
    </thead>
</table>
@endsection
