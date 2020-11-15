<?php

namespace App\Http\Controllers;

use App\Functions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ChartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function PCRChart(Request $request, $data_type, $graph_type, $chart_type)
    {

        //都道府県・市町村リスト取得
        $prefectures = DB::table('prefectures')->get();
        $prefecture_selected = $request->prefecture;
        if($request->prefecture){
            $cities = DB::table('cities')->where('prefecture_id', $request->prefecture)->get();
        } else{
            $cities = '';
        }
        $city_selected = $request->city;
        if($request->city){
            $wards = DB::table('wards')->where('city_id', $request->city)->get();
        } else {
            $wards = '';
        }
        $ward_selected = $request->ward;
        $ward_count = DB::table('wards')->where('city_id', $request->city)->count();
        //該当の地名取得
        if($chart_type == 'facility'){
            $chart_name = Auth::user()->facility->name;
        } elseif($chart_type == 'area'){
            $chart_name = Functions::getAreaName($request->prefecture, $request->city, $request->ward);
        }
        //陽性者or検査対象者
        if($data_type == 'positive'){
            $data_name = '陽性者';
        } elseif($data_type == 'target'){
            $data_name = '検査対象者';
        }
        //出力用日付データ
        if($request->end_day){
            $end_day = $request->end_day;
        } elseif($chart_type == 'facility') {
            $end_day = DB::table('input_records')->where('facility_id', Auth::user()->facility_id)->orderBy('ymd', 'desc')->first();
            $end_day = $end_day->ymd;
        } elseif($chart_type == 'area'){
            $end_day = date('Y-m-d');
        }
        if($request->start_day){
            $start_day = $request->start_day;
        } else {
            $start_day = date('Y-m-d', strtotime("-1 month", strtotime($end_day)));
        }
        $period_length = (strtotime($end_day) - strtotime($start_day)) / (60 * 60 * 24) + 1;
        // 期間の空のハッシュを生成
        $date_lenend = array();

        for($i=0;$i < $period_length; $i++){
            $day = date('m/d', strtotime("+{$i} day", strtotime($start_day)));
            $date_legend[$day] = 0;
        }
        //PCRグラフ用データ取得
        if($graph_type == 'count'){
            if($chart_type == 'facility'){
                $datas = Functions::getPCRCounts(0, 0, 0, $chart_type, $data_type);
            } elseif($chart_type == 'area'){
                $datas = Functions::getPCRCounts($request->prefecture, $request->city, $request->ward, $chart_type, $data_type);
            }
        } elseif($graph_type == 'rate'){
            if($chart_type == 'facility'){
                $datas = Functions::getPCRRate($start_day, $end_day, 0, 0, 0, "facility");
            } elseif($chart_type == 'area'){
                $datas = Functions::getPCRRate($start_day, $end_day, $request->prefecture, $request->city, $request->ward, "area");
            }
        }
        
        //データ前処理
        if($graph_type == 'count'){
            $treated_datas = Functions::treatPCRCounts($datas, $start_day, $period_length, $data_type);
        } elseif($graph_type == 'rate'){
            $treated_datas = Functions::treatPCRRate($datas, $start_day, $period_length);
        }
        $js_date_legend = json_encode($date_legend);
        
        return view('pcr_chart', compact('prefectures', 'prefecture_selected', 'cities', 'city_selected', 'wards', 'ward_selected', 'ward_count', 'chart_name', 'data_name', 'start_day', 'end_day', 'datas', 'js_date_legend', 'treated_datas', 'data_type', 'graph_type', 'chart_type'));
    }

    public function PPEChart(Request $request, $data_type, $chart_type){
        //都道府県・市町村リスト取得
        $prefectures = DB::table('prefectures')->get();
        $prefecture_selected = $request->prefecture;
        if($request->prefecture){
            $cities = DB::table('cities')->where('prefecture_id', $request->prefecture)->get();
        } else{
            $cities = '';
        }
        $city_selected = $request->city;
        if($request->city){
            $wards = DB::table('wards')->where('city_id', $request->city)->get();
        } else {
            $wards = '';
        }
        $ward_selected = $request->ward;
        $ward_count = DB::table('wards')->where('city_id', $request->city)->count();
        //該当の地名取得
        if($chart_type == 'facility'){
            $chart_name = Auth::user()->facility->name;
        } elseif($chart_type == 'area'){
            $chart_name = Functions::getAreaName($request->prefecture, $request->city, $request->ward);
        }
        //タイトル取得
        if($data_type == 'used'){
            $data_name = 'PPE使用数';
        } elseif($data_type == 'visit'){
            $data_name = 'PPE使用訪問数';
        }

        //出力用日付データ
        if($request->end_day){
            $end_day = strtotime($request->end_day);
        } elseif($chart_type == 'facility') {
            $end_day = DB::table('input_records')->where('facility_id', Auth::user()->facility_id)->orderBy('ymd', 'desc')->first();
            $end_day = strtotime($end_day->ymd);
        } elseif($chart_type == 'area'){
            $end_day = strtotime(date('Y-m-d'));
        }
        if($request->start_day){
            $start_day = strtotime($request->start_day);
        } else {
            $start_day = strtotime("-1 month", $end_day);
        }
        $start_day = date('Y-m-d', $start_day);
        $end_day = date('Y-m-d', $end_day);
        $period_length = (strtotime($end_day) - strtotime($start_day)) / (60 * 60 * 24) + 1;
        if($chart_type == 'facility'){
            $datas[0] = DB::select('select ymd, sum(ppe_'.$data_type.'_count) from input_records where facility_id = ? group by ymd',[Auth::user()->facility_id]);
        } elseif($chart_type == 'area'){
            for($i=0; $i<3; $i++){
                if($request->prefecture == 0){
                    $datas[$i] = DB::select('select ymd, sum(ppe_'.$data_type.'_count) from input_records inner join facilities on input_records.facility_id = facilities.id where type_id = ? group by ymd',[$i+1]);
                } elseif($request->city == 0){
                    $datas[$i] = DB::select('select ymd, sum(ppe_'.$data_type.'_count) from input_records inner join facilities on input_records.facility_id = facilities.id inner join cities on input_records.city_id = cities.id where prefecture_id = ? and type_id = ? group by ymd',[$request->prefecture, $i+1]);
                } elseif($request->ward == 0){
                    $datas[$i] = DB::select('select ymd, sum(ppe_'.$data_type.'_count) from input_records inner join facilities on input_records.facility_id = facilities.id where input_records.city_id = ? and type_id = ? group by ymd',[$request->city, $i+1]);
                } else {
                    $datas[$i] = DB::select('select ymd, sum(ppe_'.$data_type.'_count) from input_records inner join facilities on input_records.facility_id = facilities.id where input_records.ward_id = ? and type_id = ? group by ymd',[$request->ward, $i+1]);
                }
            }
        }
        $j=0;
        foreach($datas as $data){
            $raw_datas[$j] = array_column($data, 'sum(ppe_'.$data_type.'_count)', 'ymd');
            for($k=0; $k < $period_length; $k++){
                $day = date('Y-m-d', strtotime("+{$k} day", strtotime($start_day)));
                if(array_key_exists($day, $raw_datas[$j])){
                    $sorted_datas[$j][$day] = $raw_datas[$j][$day];
                } else {
                    $sorted_datas[$j][$day] = 0;
                }
            }
            $j++;
        }
        $js_datas = json_encode($sorted_datas);
            
        // 期間の空のハッシュを生成
        $date_legend = array();

        for($i=0;$i < $period_length; $i++){
            $day = date('m/d', strtotime("+{$i} day", strtotime($start_day)));
            $date_legend[$day] = 0;
        }
        $js_date_legend = json_encode($date_legend);

        return view('ppe_chart', compact('prefectures', 'prefecture_selected', 'cities', 'city_selected', 'wards', 'ward_selected', 'ward_count', 'start_day', 'end_day', 'chart_name', 'js_datas', 'data_type', 'chart_type', 'js_date_legend','data_name'));
    }

    public function questionnaireChart(Request $request, $data_type, $chart_type) {
        //都道府県・市町村リスト取得
        $prefectures = DB::table('prefectures')->get();
        $prefecture_selected = $request->prefecture;
        if($request->prefecture){
            $cities = DB::table('cities')->where('prefecture_id', $request->prefecture)->get();
        } else{
            $cities = '';
        }
        $city_selected = $request->city;
        if($request->city){
            $wards = DB::table('wards')->where('city_id', $request->city)->get();
        } else {
            $wards = '';
        }
        $ward_selected = $request->ward;
        $ward_count = DB::table('wards')->where('city_id', $request->city)->count();
        //該当の地名取得
        if($chart_type == 'facility'){
            $chart_name = Auth::user()->facility->name;
        } elseif($chart_type == 'area'){
            $chart_name = Functions::getAreaName($request->prefecture, $request->city, $request->ward);
        }

        //出力用日付データ
        if($request->end_day){
            $end_day = strtotime($request->end_day);
        } elseif($chart_type == 'facility') {
            $end_day = DB::table('input_records')->where('facility_id', Auth::user()->facility_id)->orderBy('ymd', 'desc')->first();
            $end_day = strtotime($end_day->ymd);
        } elseif($chart_type == 'area'){
            $end_day = strtotime(date('Y-m-d'));
        }
        if($request->start_day){
            $start_day = strtotime($request->start_day);
        } else {
            $start_day = strtotime("-1 month", $end_day);
        }
        $start_day = date('Y-m-d', $start_day);
        $end_day = date('Y-m-d', $end_day);

        if($data_type == 1){
            $labels = ['緊急搬送先が見つからないことがある','自施設・自宅で療養することがある', 'PCR検査が受けられないことがある', '往診・訪問看護を断られることがある', '提携先から往診・訪問看護を断られることがある'];
            $column_names = ['answer_to_q1_1', 'answer_to_q1_2', 'answer_to_q1_3', 'answer_to_q1_4', 'answer_to_q1_5'];
        } elseif($data_type == 2){
            $labels = ['PPEが足りない', '感染対策で人が足りない', '感染予防・防御策の実装で困っている', '利用者・家族への情報提供の内容に困っている'];
            $column_names = ['answer_to_q2_1', 'answer_to_q2_2', 'answer_to_q2_3', 'answer_to_q2_4']; 
        }

        $sorted_datas = array();

        for($i=1; $i<=4; $i++){
            $j=0;
            foreach($column_names as $column_name){
                if($chart_type == 'facility'){
                    $sorted_datas[$i-1][$j] = DB::table('input_records')->where('ymd', '>=', $start_day)->where('ymd', '<=', $end_day)->where('facility_id', Auth::user()->facility_id)->where($column_name, $i)->count();
                }        
                elseif($chart_type == 'area'){
                    if($request->prefecture == 0){
                        $sorted_datas[$i-1][$j] = DB::table('input_records')->where('ymd', '>=', $start_day)->where('ymd', '<=', $end_day)->where($column_name, $i)->whereNull('deleted_at')->count();
                    } elseif($request->city == 0){
                        $sorted_datas[$i-1][$j] = DB::table('input_records')->where('ymd', '>=', $start_day)->where('ymd', '<=', $end_day)->join('cities', 'city_id', '=', 'id')->where('prefecture_id', $request->prefecture)->where($column_name, $i)->whereNull('deleted_at')->count();
                    } elseif($request->ward == 0){
                        $sorted_datas[$i-1][$j] = DB::table('input_records')->where('ymd', '>=', $start_day)->where('ymd', '<=', $end_day)->where('city_id', $request->city)->where($column_name, $i)->whereNull('deleted_at')->count();
                    } else{
                        $sorted_datas[$i-1][$j] = DB::table('input_records')->where('ymd', '>=', $start_day)->where('ymd', '<=', $end_day)->where('ward_id', $request->ward)->where($column_name, $i)->whereNull('deleted_at')->count();
                    }
                }
                $j++;
            }    
        }
        $sorted_datas = json_encode($sorted_datas);
        $labels = json_encode($labels);
        
        return view('questionnaire_chart', compact('prefectures', 'prefecture_selected', 'cities', 'city_selected', 'wards', 'ward_selected', 'ward_count','chart_name','start_day','end_day','sorted_datas','labels', 'column_names', 'data_type', 'chart_type'));
    }
}
