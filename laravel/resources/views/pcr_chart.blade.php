@extends('layouts.parent')
@section('title', 'ECIS | PCR検査関係グラフ')
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
<h2 id="title">{{ $chart_name }}のPCR{{ $data_name }}数</h2><br>
<h2>（{{ $start_day }}〜{{ $end_day }}）</h2><br>
<button class="btn btn-success" onclick="switchChart()">割合表示切替</button>
<div class="container">
@if($graph_type == 'count')
@include('charts.pcr_count')
@elseif($graph_type == 'rate')
@include('charts.pcr_rate')
@endif
</div>
<form action="{{ route('pcr_chart', ['data_type' => $data_type, 'graph_type' => $graph_type, 'chart_type' => $chart_type]) }}" method="get">
@if($chart_type == 'facility')
@include('search_form_facility')
@elseif($chart_type == 'area')
@include('search_form_area')
@endif
</form>
@if($graph_type == 'count')
<?php $switch_graph = 'rate' ?>
@elseif($graph_type == 'rate')
<?php $switch_graph = 'count' ?>
@endif
<script>
function switchChart(){
    location.href = '{{ route('pcr_chart',['data_type' => $data_type, 'graph_type' => $switch_graph, 'chart_type' => $chart_type]) }}' + location.search;
}
</script>
@endsection