@extends('layouts.parent')
@section('title', 'ECIS | ユーザー施設登録')
@section('pageJs')
<script src="{{ asset('js/register-facility.js') }}"></script>
@endsection
@section('pageCss')
<link href="{{ asset('/css/admin.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="form">
    <form action="{{ route('register_facility_update', ['user_id' => $user_id]) }}" method="post">
        @csrf
        <select id="prefecture" name="prefecture" class="form-control">
        <option>--選んでください--</option>
            @foreach($prefectures as $prefecture)
            <option value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
            @endforeach
        </select>
        <label for="city" id="label-city" style="display:none">市町村</label>
        <select id="city" name="city" class="form-control" style="display:none">
        </select>
        <select id="facility" name="facility_id" class="form-control" style="display:none">
        </select>
        <button type="submit" class="btn btn-success" id="submit-button" style="display:none">登録</button>
    </form>
</div>   
@endsection