@extends('layouts.parent')
@section('title', 'ECIS | PPE関係グラフ')
@section('pageCss')
<link rel="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
<link href="{{ asset('/css/chart.css') }}" rel="stylesheet">
@endsection
@section('pageJs')
@if($chart_type == 'area')
<script src="{{ asset('js/cities.js') }}"></script>
@endif
@endsection
@section('content')

<h2 id="title">{{ $chart_name }}の{{ $data_name }}</h2><br>
<h2>（{{ $start_day }}〜{{ $end_day }}）</h2>
<div class="container">
@if($chart_type == 'facility')
@include('charts.ppe_facility')
@elseif($chart_type == 'area')
@include('charts.ppe_area')
@endif
</div>

<form action="{{ route('ppe_chart', ['data_type' => $data_type, 'chart_type' => $chart_type]) }}" method="get">
@if($chart_type == 'facility')
@include('search_form_facility')
@elseif($chart_type == 'area')
@include('search_form_area')
@endif
</form>

@endsection