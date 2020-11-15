@extends('layouts.parent')
@section('title', 'ECIS | 施設登録')
@section('pageCss')
<link href="{{ asset('/css/admin.css') }}" rel="stylesheet">
@endsection
@section('pageJs')
<script src="{{ asset('/js/admin.js') }}"></script>
@endsection
@section('content')
<h2>施設登録</h2><br>
<div class="form">
    <form action="{{ route('facility.store') }}" method="post">
    @csrf
        <label for="prefecture">都道府県</label>
        <select id="prefecture" name="prefecture" class="form-control">
        <option>--選んでください--</option>
        @foreach($prefectures as $prefecture)
        <option value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
        @endforeach
        </select>
        <label for="city" id="label-city" style="display:none">市町村</label>
        <select id="city" name="city_id" class="form-control" style="display:none">
        </select>
        <label for="ward" id="label-ward" style="display:none">区</label>
        <select id="ward" name="ward_id" class="form-control" style="display:none">
        </select>
        <label for="name" id="label-name"  style="display:none">施設名</label>
        <input type="text" id="name" name="name" class="form-control" style="display:none" required>
        <label for="type" id="label-type"  style="display:none">種別</label>
        <select id="type" name="type_id" class="form-control" style="display:none">
            <option value="1">訪問系</option>
            <option value="2">入居系</option>
            <option value="3">通所系</option>
        </select>
        <button type="submit" class="btn btn-success" id="submit-button" style="display:none">登録</button>
    </form>
</div>    
@endsection
