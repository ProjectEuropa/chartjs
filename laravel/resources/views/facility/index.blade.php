@extends('layouts.parent')
@section('title', 'ECIS | 施設一覧')
@section('pageCss')
<link href="{{ asset('/css/admin.css') }}" rel="stylesheet">
@endsection
@section('pageJs')
<script src="{{ asset('/js/laravel.js') }}" type="text/javascript"></script>
@endsection
@section('content')
<h2>施設一覧</h2><br>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>名前</th>
            <th>所在地</th>
            <th>種別</th>
            <th><br></th>
        </tr>
        @foreach($facilities as $facility)
        <tr>
            <th>{{ $facility->id }}</th>
            <th>{{ $facility->name }}</th>
            <th>
            {{ $facility->city->prefecture->name }}
            @if($facility->city_id != 628)
            {{ $facility->city->name }}
            @endif
            @if($facility->ward_id)
            {{ $facility->ward->name }}
            @endif
            </th>
            <th>
            @if($facility->type_id == 1)
            訪問系
            @elseif($facility->type_id == 2)
            入居系
            @elseif($facility->type_id == 3)
            通所系
            @endif
            </th>
            <th>
                <a href="{{ route('facility.edit', ['facility' => $facility->id ]) }}" class="btn btn-primary">編集</a>
                <form action="{{ route('facility.destroy', ['facility' => $facility->id]) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="delete">
                    <button type="submit" class="btn btn-danger">削除</button>
                </form>
            <th>
        </tr>
        @endforeach
    </thead>
</table>
@endsection
