@extends('layouts.parent')
@section('title', 'ECIS 〜広域災害介護福祉情報システム〜')
@section('pageCss')
<link href="{{ asset('/css/welcome.css') }}" rel="stylesheet">
@endsection
@section('content')

<h1>ECIS</h1>
<h2>〜広域災害介護福祉情報システム〜</h2>
@if(!Auth::check())
<div id="button-wrapper">
<button class="btn btn-success btn-lg" onclick="login()">ログイン</button>
<button class="btn btn-success btn-lg" onclick="register()">新規登録</button>
</div>
@endif
@endsection