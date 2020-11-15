@extends('layouts.parent')
@section('title', 'ECIS | ユーザー情報編集')
@section('pageCss')
<link href="{{ asset('/css/admin.css') }}" rel="stylesheet">
@endsection
@section('pageJs')
<script src="{{ asset('/js/admin.js') }}"></script>
@endsection
@section('content')
<h2>ユーザー編集</h2><br>
<div class="form">
    <form action="{{ route('user.update', ['user' => $user->id]) }}" method="post">
    @csrf
    @method('put')
        <input type="hidden" name="id" value="{{ $user->id }}">
        <label for="name">名前</label>
        <input type="text" name="name" value="{{ $user->name }}" class="form-control">
        <label for="email">メールアドレス</label>
        <input type="email" name="email" value="{{ $user->email }}" class="form-control">
        <label for="user_type">ユーザー区分</label>
        <select id="type" name="user_type" class="form-control">
            <option value="1" 
            @if($user->user_type == 1)
            selected
            @endif
            >介護</option>
            <option value="2" 
            @if($user->user_type == 2)
            selected
            @endif
            >行政</option>
            <option value="3"
            @if($user->user_type == 3)
            selected
            @endif
            >管理</option>
        </select>
        <button type="submit" class="btn btn-success" class="submit-button">登録</button>
    </form>
</div>    
@endsection
