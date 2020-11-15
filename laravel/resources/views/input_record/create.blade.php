@extends('layouts.parent')
@section('title', 'ECIS | データ入力画面')
@section('pageCss')
<link href="{{ asset('/css/input.css') }}" rel="stylesheet">
@endsection
@section('pageJs')
<script src="{{ asset('js/input.js') }}"></script>
@endsection
@section('content')
<h2>入力画面</h2>
<div class="alert alert-info" role="alert">
@if($date == date('Y-m-d'))
本日のデータを登録してください。
@else
{{ date('m月d日', strtotime($date))}}のデータを登録してください。
@endif
<br>
入力フォームには前回の入力内容が引き継がれております。<br>
変更がある場合は内容を修正し、ない場合はそのまま登録ボタンを押してください。
</div>
        <form action="{{ url('input_record') }}" method="post">
            @csrf
            <div class="container" id="input-form">
                <div class="row">
                    <div class="col-md">
                        <h4>基本情報</h4>
                        <p>
                            <label>日付</label><br>
                            {{ date('Y/m/d', strtotime($date)) }}
                            <input type="hidden" name="ymd" value="{{ $date }}" />
                        </p>
                        <p>施設名<br>{{ Auth::user()->facility->name }}</p>
                        <input type="hidden" name="facility_id" value="{{ Auth::user()->facility->id }}">
                        <p>所在地<br>{{ $area_name }}</p>
                        <input type="hidden" name="city_id" value="{{ $city_id }}">
                        <input type="hidden" name="ward_id" value="{{ $ward_id }}">
                    </div>
                    <div class="col-md">
                        <h4>基礎数</h4>
                        <p>
                            <label>利用者数<span class="badge badge-danger" id="badge-user-count">変更済</span></label>
                            <input
                                id="user-count"
                                type="number"
                                name="user_count"
                                @if($exist_latest)
                                value="{{ $latest->user_count }}"
                                @endif
                                required
                            />
                        </p>
                        <p>
                            <label>利用者同居人数<span class="badge badge-danger" id="badge-user-family-count">変更済</span></label>
                            <input
                                id="user-family-count"
                                type="number"
                                name="user_family_count"
                                @if($exist_latest)
                                value="{{ $latest->user_family_count }}"
                                @endif
                                required
                            />
                        </p>
                        <p>
                            <label>スタッフ数<span class="badge badge-danger" id="badge-staff-count">変更済</span></label>
                            <input
                                id="staff-count"
                                type="number"
                                name="staff_count"
                                @if($exist_latest)
                                value="{{ $latest->staff_count }}"
                                @endif
                                required
                            />
                        </p>
                        <p>
                            <label>スタッフ同居人数<span class="badge badge-danger" id="badge-staff-family-count">変更済</span></label>
                            <input
                                id="staff-family-count"
                                type="number"
                                name="staff_family_count"
                                @if($exist_latest)
                                value="{{ $latest->staff_family_count }}"
                                @endif
                                required
                            />
                        </p>
                    </div>
                    <div class="col-md">
                        <h4 class="long">PCR検査陽性者数</h4>
                        <p>
                            <label>利用者<span class="badge badge-danger" id="badge-positive-user-count">変更済</span></label>
                            <input
                                id="positive-user-count"
                                type="number"
                                name="positive_user_count"
                                @if($exist_latest)
                                value="{{ $latest->positive_user_count }}"
                                @endif
                                required
                            />
                        </p>
                        <p>
                            <label>利用者同居人<span class="badge badge-danger" id="badge-positive-user-family-count">変更済</span></label>
                            <input
                                id="positive-user-family-count"
                                type="number"
                                name="positive_user_family_count"
                                @if($exist_latest)
                                value="{{ $latest->positive_user_family_count }}"
                                @endif
                                required
                            />
                        </p>
                        <p>
                            <label>スタッフ<span class="badge badge-danger" id="badge-positive-staff-count">変更済</span></label>
                            <input
                                id="positive-staff-count"
                                type="number"
                                name="positive_staff_count"
                                @if($exist_latest)
                                value="{{ $latest->positive_staff_count }}"
                                @endif
                                required
                            />
                        </p>
                        <p>
                            <label>スタッフ同居人<span class="badge badge-danger" id="badge-positive-staff-family-count">変更済</span></label>
                            <input
                                id="positive-staff-family-count"
                                type="number"
                                name="positive_staff_family_count"
                                @if($exist_latest)
                                value="{{ $latest->positive_staff_family_count }}"
                                @endif
                                required
                            />
                        </p>
                    </div>
                    <div class="col-md">
                        <h4 class="long">PCR検査対象者数</h4>
                        <p>
                            <label>利用者<span class="badge badge-danger" id="badge-target-user-count">変更済</span></label>
                            <input
                                id="target-user-count"
                                type="number"
                                name="target_user_count"
                                @if($exist_latest)
                                value="{{ $latest->target_user_count }}"
                                @endif
                                required
                            />
                        </p>
                        <p>
                            <label>利用者同居人<span class="badge badge-danger" id="badge-target-user-family-count">変更済</span></label>
                            <input
                                id="target-user-family-count"
                                type="number"
                                name="target_user_family_count"
                                @if($exist_latest)
                                value="{{ $latest->target_user_family_count }}"
                                @endif
                                required
                            />
                        </p>
                        <p>
                            <label>スタッフ<span class="badge badge-danger" id="badge-target-staff-count">変更済</span></label>
                            <input
                                id="target-staff-count"
                                type="number"
                                name="target_staff_count"
                                @if($exist_latest)
                                value="{{ $latest->target_staff_count }}"
                                @endif
                                required
                            />
                        </p>
                        <p>
                            <label>スタッフ同居人<span class="badge badge-danger" id="badge-target-staff-family-count">変更済</span></label>
                            <input
                                id="target-staff-family-count"
                                type="number"
                                name="target_staff_family_count"
                                @if($exist_latest)
                                value="{{ $latest->target_staff_family_count }}"
                                @endif
                                required
                            />
                        </p>
                    </div>
                    <div class="col-md">
                        <h4>PPE関連</h4>
                        <p>
                            <label>使用訪問数<span class="badge badge-danger" id="badge-ppe-visit">変更済</span></label>
                            <input
                                id="ppe-visit"
                                type="number"
                                name="ppe_visit_count"
                                @if($exist_latest)
                                value="{{ $latest->ppe_visit_count }}"
                                @endif
                                required
                            />
                        </p>
                        <p>
                            <label>使用数<span class="badge badge-danger" id="badge-ppe-used">変更済</span></label>
                            <input id="ppe-used" type="number" name="ppe_used_count"
                            @if($exist_latest)
                            value="{{ $latest->ppe_used_count }}"
                            @endif
                            required/>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h4>アンケート（医療機関関連）</h4>
                        <p>
                            <label
                                >質問1：緊急搬送先が見つからないことがある<span class="badge badge-danger" id="badge-q1-1">変更済</span></label
                            ><br />
                            <select name="answer_to_q1_1" id="q1-1">
                            @if($exist_latest)
                                <option value="4" 
                                @if($latest->answer_to_q1_1 == 4)
                                selected
                                @endif
                                >頻繁にある</option>
                                <option value="3" 
                                @if($latest->answer_to_q1_1 == 3)
                                selected
                                @endif
                                >時々ある</option>
                                <option value="2" 
                                @if($latest->answer_to_q1_1 == 2)
                                selected
                                @endif
                                >ほとんど無い</option>
                                <option value="1" 
                                @if($latest->answer_to_q1_1 == 1)
                                selected
                                @endif
                                >一度も無い</option>
                            @else
                            <option value="4">頻繁にある</option>
                            <option value="3">時々ある</option>
                            <option value="2" selected>ほとんど無い</option>
                            <option value="1">一度も無い</option>
                            @endif
                            </select>
                        </p>
                        <p>
                            <label
                                >質問2：PCR陽性でも自施設・自宅で療養することがある<span class="badge badge-danger" id="badge-q1-2">変更済</span></label
                            ><br />
                            <select name="answer_to_q1_2" id="q1-2">
                            @if($exist_latest)
                                <option value="4" 
                                @if($latest->answer_to_q1_2 == 4)
                                selected
                                @endif
                                >頻繁にある</option>
                                <option value="3" 
                                @if($latest->answer_to_q1_2 == 3)
                                selected
                                @endif
                                >時々ある</option>
                                <option value="2" 
                                @if($latest->answer_to_q1_2 == 2)
                                selected
                                @endif
                                >ほとんど無い</option>
                                <option value="1" 
                                @if($latest->answer_to_q1_2 == 1)
                                selected
                                @endif
                                >一度も無い</option>
                            @else
                            <option value="4">頻繁にある</option>
                            <option value="3">時々ある</option>
                            <option value="2" selected>ほとんど無い</option>
                            <option value="1">一度も無い</option>
                            @endif
                            </select>
                        </p>
                        <p>
                            <label
                                >質問3：感染の疑いがあってもPCR検査が受けられないことがある<span class="badge badge-danger" id="badge-q1-3">変更済</span></label
                            ><br />
                            <select name="answer_to_q1_3" id="q1-3">
                            @if($exist_latest)
                            <option value="4" 
                                @if($latest->answer_to_q1_3 == 4)
                                selected
                                @endif
                                >頻繁にある</option>
                                <option value="3" 
                                @if($latest->answer_to_q1_3 == 3)
                                selected
                                @endif
                                >時々ある</option>
                                <option value="2" 
                                @if($latest->answer_to_q1_3 == 2)
                                selected
                                @endif
                                >ほとんど無い</option>
                                <option value="1" 
                                @if($latest->answer_to_q1_3 == 1)
                                selected
                                @endif
                                >一度も無い</option>
                            @else
                            <option value="4">頻繁にある</option>
                            <option value="3">時々ある</option>
                            <option value="2" selected>ほとんど無い</option>
                            <option value="1">一度も無い</option>
                            @endif
                            </select>
                        </p>
                        <p>
                            <label
                                >質問4：往診・訪問看護を依頼しても断られることがある<span class="badge badge-danger" id="badge-q1-4">変更済</span></label
                            ><br />
                            <select name="answer_to_q1_4" id="q1-4">
                            @if($exist_latest)
                            <option value="4" 
                                @if($latest->answer_to_q1_4 == 4)
                                selected
                                @endif
                                >頻繁にある</option>
                                <option value="3" 
                                @if($latest->answer_to_q1_4 == 3)
                                selected
                                @endif
                                >時々ある</option>
                                <option value="2" 
                                @if($latest->answer_to_q1_4 == 2)
                                selected
                                @endif
                                >ほとんど無い</option>
                                <option value="1" 
                                @if($latest->answer_to_q1_4 == 1)
                                selected
                                @endif
                                >一度も無い</option>
                            @else
                            <option value="4">頻繁にある</option>
                            <option value="3">時々ある</option>
                            <option value="2" selected>ほとんど無い</option>
                            <option value="1">一度も無い</option>
                            @endif
                            </select>
                        </p>
                        <p>
                            <label
                                >質問5：提携先から往診・訪問看護を断られることがある<span class="badge badge-danger" id="badge-q1-5">変更済</span></label
                            ><br />
                            <select name="answer_to_q1_5" id="q1-5">
                            @if($exist_latest)
                            <option value="4" 
                                @if($latest->answer_to_q1_5 == 4)
                                selected
                                @endif
                                >頻繁にある</option>
                                <option value="3" 
                                @if($latest->answer_to_q1_5 == 3)
                                selected
                                @endif
                                >時々ある</option>
                                <option value="2" 
                                @if($latest->answer_to_q1_5 == 2)
                                selected
                                @endif
                                >ほとんど無い</option>
                                <option value="1" 
                                @if($latest->answer_to_q1_5 == 1)
                                selected
                                @endif
                                >一度も無い</option>
                            @else
                            <option value="4">頻繁にある</option>
                            <option value="3">時々ある</option>
                            <option value="2" selected>ほとんど無い</option>
                            <option value="1">一度も無い</option>
                            @endif
                            </select>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h4>アンケート（支援ニーズ）</h4>
                        <p>
                            <label>質問1：PPEが足りない<span class="badge badge-danger" id="badge-q2-1">変更済</span></label><br />
                            <select name="answer_to_q2_1" id="q2-1">
                            @if($exist_latest)
                                <option value="4"
                                @if($latest->answer_to_q2_1 == 4)
                                selected
                                @endif
                                >非常に困っている</option>
                                <option value="3"
                                @if($latest->answer_to_q2_1 == 3)
                                selected
                                @endif
                                >困っている</option>
                                <option value="2"
                                @if($latest->answer_to_q2_1 == 2)
                                selected
                                @endif
                                >たまに困っている</option>
                                <option value="1"
                                @if($latest->answer_to_q2_1 == 1)
                                selected
                                @endif
                                >困っていない</option>
                            @else
                            <option value="4">非常に困っている</option>
                            <option value="3">困っている</option>
                            <option value="2" selected>たまに困っている</option>
                            <option value="1">困っていない</option>
                            @endif
                            </select>
                        </p>
                        <p>
                            <label>質問2：感染対策で人が足りない<span class="badge badge-danger" id="badge-q2-2">変更済</span></label><br />
                            <select name="answer_to_q2_2" id="q2-2">
                            @if($exist_latest)
                            <option value="4"
                                @if($latest->answer_to_q2_2 == 4)
                                selected
                                @endif
                                >非常に困っている</option>
                                <option value="3"
                                @if($latest->answer_to_q2_2 == 3)
                                selected
                                @endif
                                >困っている</option>
                                <option value="2"
                                @if($latest->answer_to_q2_2 == 2)
                                selected
                                @endif
                                >たまに困っている</option>
                                <option value="1"
                                @if($latest->answer_to_q2_2 == 1)
                                selected
                                @endif
                                >困っていない</option>
                            @else
                            <option value="4">非常に困っている</option>
                            <option value="3">困っている</option>
                            <option value="2" selected>たまに困っている</option>
                            <option value="1">困っていない</option>
                            @endif
                            </select>
                        </p>
                        <p>
                            <label
                                >質問3：感染予防・防御策の実装で困っている<span class="badge badge-danger" id="badge-q2-3">変更済</span></label
                            ><br />
                            <select name="answer_to_q2_3" id="q2-3">
                            @if($exist_latest)
                            <option value="4"
                                @if($latest->answer_to_q2_3 == 4)
                                selected
                                @endif
                                >非常に困っている</option>
                                <option value="3"
                                @if($latest->answer_to_q2_3 == 3)
                                selected
                                @endif
                                >困っている</option>
                                <option value="2"
                                @if($latest->answer_to_q2_3 == 2)
                                selected
                                @endif
                                >たまに困っている</option>
                                <option value="1"
                                @if($latest->answer_to_q2_3 == 1)
                                selected
                                @endif
                                >困っていない</option>
                            @else
                            <option value="4">非常に困っている</option>
                            <option value="3">困っている</option>
                            <option value="2" selected>たまに困っている</option>
                            <option value="1">困っていない</option>
                            @endif
                            </select>
                        </p>
                        <p>
                            <label
                                >質問4：利用者・家族への情報提供の内容に困っている<span class="badge badge-danger" id="badge-q2-4">変更済</span></label
                            ><br />
                            <select name="answer_to_q2_4" id="q2-4">
                            @if($exist_latest)
                            <option value="4"
                                @if($latest->answer_to_q2_4 == 4)
                                selected
                                @endif
                                >非常に困っている</option>
                                <option value="3"
                                @if($latest->answer_to_q2_4 == 3)
                                selected
                                @endif
                                >困っている</option>
                                <option value="2"
                                @if($latest->answer_to_q2_4 == 2)
                                selected
                                @endif
                                >たまに困っている</option>
                                <option value="1"
                                @if($latest->answer_to_q2_4 == 1)
                                selected
                                @endif
                                >困っていない</option>
                            @else
                            <option value="4">非常に困っている</option>
                            <option value="3">困っている</option>
                            <option value="2" selected>たまに困っている</option>
                            <option value="1">困っていない</option>
                            @endif
                            </select>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-success">
                            登録
                        </button>
                        <button type="reset" class="btn btn-warning">
                            リセット
                        </button>
                    </div>
                </div>
            </div>
        </form>
@endsection