@extends('layouts.parent')
@section('title', 'ECIS | 施設情報編集')
@section('pageCss')
<link href="{{ asset('/css/admin.css') }}" rel="stylesheet">
@endsection
@section('content')
<h2>施設情報編集</h2><br>
<div class="form">
    <form action="{{ route('facility.update', ['facility' => $facility->id]) }}" method="post">
    @csrf
    @method('put')
        <input type="hidden" name="id" value="{{ $facility->id }}">
        <label for="name">名前</label>
        <input type="text" name="name" value="{{ $facility->name }}" class="form-control">
        <label for="type_id">施設区分</label>
        <select id="type" name="type_id" class="form-control">
            <option value="1" 
            @if($facility->type_id == 1)
            selected
            @endif
            >訪問系</option>
            <option value="2" 
            @if($facility->type_id == 2)
            selected
            @endif
            >入居系</option>
            <option value="3"
            @if($facility->type_id == 3)
            selected
            @endif
            >通所系</option>
        </select>
        <button type="submit" class="btn btn-success" id="submit-button">登録</button>
    </form>
</div>    
@endsection
