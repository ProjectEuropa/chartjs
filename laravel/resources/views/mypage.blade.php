@extends('layouts.parent')
@section('title', 'ECIS | マイページ')
@section('pageCss')
<link href="{{ asset('/css/mypage.css') }}" rel="stylesheet">
@endsection
@section('content')
@if(Auth::user()->user_type == 1)
<h2>マイページ</h2><br>
<div class="container">
    <button onclick="oneMonthBefore()" class="btn btn-primary"><< 前月</button>
    <h4>{{ $year }}年{{ $month }}月</h4>
    <button onclick="oneMonthAfter()" class="btn btn-primary">次月 >></button>
    <button onclick="switchPage()" class="btn btn-primary">表示データ切替</button>
    <h4>施設名：{{ Auth::user()->facility->name ?? '未登録' }}</h4>
</div>

@if($page == 1 || $page == '')
<table class="table">
    <thead>
        <tr>
            <th rowspan="2" colspan="2">日付</th>
            <th colspan="4">基礎数</th>
            <th colspan="4">PCR検査陽性者数</th>
            <th colspan="4">PCR検査対象者数</th>
            <th colspan="2">PPE</th>
        </tr>
        <tr>
            <th>利用者</th>
            <th>利用者<br>同居人</th>
            <th>スタッフ</th>
            <th>スタッフ<br>同居人</th>
            <th>利用者</th>
            <th>利用者<br>同居人</th>
            <th>スタッフ</th>
            <th>スタッフ<br>同居人</th>
            <th>使用数</th>
            <th>訪問数</th>
            <th>スタッフ</th>
            <th>スタッフ<br>同居人</th>
            <th>使用数</th>
            <th>訪問数</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sorted_datas as $data)
        <tr>
        <th><?php echo date('m/d', strtotime($data['ymd'])); ?></th>
        <th>
            @if($data['has_record'] == 1)
            <button class="btn btn-success" onclick="editRecord('{{ $data['ymd'] }}')">入力済</button>
            @elseif($data['has_record'] == 0 && $data['ymd'] <= $today)
            <button class="btn btn-danger" onclick="createRecord('{{ $data['ymd'] }}')">未入力</button>
            @endif
        </th>
        <th>{{ $data['user_count'] }}</th>
        <th>{{ $data['user_family_count'] }}</th>
        <th>{{ $data['staff_count'] }}</th>
        <th>{{ $data['staff_family_count'] }}</th>
        <th>{{ $data['positive_user_count'] }}</th>
        <th>{{ $data['positive_user_family_count'] }}</th>
        <th>{{ $data['positive_staff_count'] }}</th>
        <th>{{ $data['positive_staff_family_count'] }}</th>
        <th>{{ $data['target_user_count'] }}</th>
        <th>{{ $data['target_user_family_count'] }}</th>
        <th>{{ $data['target_staff_count'] }}</th>
        <th>{{ $data['target_staff_family_count'] }}</th>
        <th>{{ $data['ppe_used_count'] }}</th>
        <th>{{ $data['ppe_visit_count'] }}</th>
        </tr>
        @endforeach
    </tbody>
</table>
@elseif($page == 2)
<table class="table">
    <thead>
        <tr>
            <th rowspan="2" colspan="2">日付</th>
            <th colspan="5">アンケート1</th>
            <th colspan="4">アンケート2</th>
        </tr>
        <tr>
            <th>Q1</th>
            <th>Q2</th>
            <th>Q3</th>
            <th>Q4</th>
            <th>Q5</th>
            <th>Q1</th>
            <th>Q2</th>
            <th>Q3</th>
            <th>Q4</th>

        </tr>
    </thead>
    <tbody>
        @foreach($sorted_datas as $data)
        <tr>
        <th><?php echo date('m/d', strtotime($data['ymd'])); ?></th>
        <th>
            @if($data['has_record'] == 1)
            <button class="btn btn-success" onclick="editRecord('{{ $data['ymd'] }}')">入力済</button>
            @elseif($data['has_record'] == 0 && $data['ymd'] <= $today)
            <button class="btn btn-danger" onclick="createRecord('{{ $data['ymd'] }}')">未入力</button>
            @endif
        </th>
        <th>
        @if($data['answer_to_q1_1'] == 4)
        頻繁にある
        @elseif($data['answer_to_q1_1'] == 3)
        時々ある
        @elseif($data['answer_to_q1_1'] == 2)
        ほとんど無い
        @elseif($data['answer_to_q1_1'] == 1)
        一度も無い
        @endif
        </th>
        <th>
        @if($data['answer_to_q1_2'] == 4)
        頻繁にある
        @elseif($data['answer_to_q1_2'] == 3)
        時々ある
        @elseif($data['answer_to_q1_2'] == 2)
        ほとんど無い
        @elseif($data['answer_to_q1_2'] == 1)
        一度も無い
        @endif
        </th>
        <th>
        @if($data['answer_to_q1_3'] == 4)
        頻繁にある
        @elseif($data['answer_to_q1_3'] == 3)
        時々ある
        @elseif($data['answer_to_q1_3'] == 2)
        ほとんど無い
        @elseif($data['answer_to_q1_3'] == 1)
        一度も無い
        @endif
        </th>
        <th>
        @if($data['answer_to_q1_4'] == 4)
        頻繁にある
        @elseif($data['answer_to_q1_4'] == 3)
        時々ある
        @elseif($data['answer_to_q1_4'] == 2)
        ほとんど無い
        @elseif($data['answer_to_q1_4'] == 1)
        一度も無い
        @endif
        </th>
        <th>
        @if($data['answer_to_q1_5'] == 4)
        頻繁にある
        @elseif($data['answer_to_q1_5'] == 3)
        時々ある
        @elseif($data['answer_to_q1_5'] == 2)
        ほとんど無い
        @elseif($data['answer_to_q1_5'] == 1)
        一度も無い
        @endif
        </th>
        <th>
        @if($data['answer_to_q2_1'] == 4)
        非常に困っている
        @elseif($data['answer_to_q2_1'] == 3)
        困っている
        @elseif($data['answer_to_q2_1'] == 2)
        たまに困っている
        @elseif($data['answer_to_q2_1'] == 1)
        困っていない
        @endif
        </th>
        <th>
        @if($data['answer_to_q2_2'] == 4)
        非常に困っている
        @elseif($data['answer_to_q2_2'] == 3)
        困っている
        @elseif($data['answer_to_q2_2'] == 2)
        たまに困っている
        @elseif($data['answer_to_q2_2'] == 1)
        困っていない
        @endif
        </th>
        <th>
        @if($data['answer_to_q2_3'] == 4)
        非常に困っている
        @elseif($data['answer_to_q2_3'] == 3)
        困っている
        @elseif($data['answer_to_q2_3'] == 2)
        たまに困っている
        @elseif($data['answer_to_q2_3'] == 1)
        困っていない
        @endif
        </th>
        <th>
        @if($data['answer_to_q2_4'] == 4)
        非常に困っている
        @elseif($data['answer_to_q2_4'] == 3)
        困っている
        @elseif($data['answer_to_q2_4'] == 2)
        たまに困っている
        @elseif($data['answer_to_q2_4'] == 1)
        困っていない
        @endif
        </th>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
<script>
function switchPage(){
    var thisPage = <?php echo $page ?>;
    if(thisPage == 1){
        var switchedPage = 2;
    } else if(thisPage == 2){
        var switchedPage = 1;
    }
    location.href =  '{{ route('mypage') }}' + '?year=' + '{{ $year }}' + '&month=' + '{{ $month }}' + '&page=' + switchedPage;
}

function oneMonthBefore(){
    location.href = '{{ route('mypage') }}' + '?year=' + '{{ $one_month_before_year }}' + '&month=' + '{{ $one_month_before_month }}' + '&page=' + '{{ $page }}';
}
function oneMonthAfter(){
    location.href = '{{ route('mypage') }}' + '?year=' + '{{ $one_month_after_year }}' + '&month=' + '{{ $one_month_after_month }}' + '&page=' + '{{ $page }}';
}
function createRecord(date){
    location.href = '{{ route('input_record.create') }}' + '?date=' + date;
}
function editRecord(date){
    location.href = '/input_record/' + date + '/edit';
}
</script>
@endif
@endsection
