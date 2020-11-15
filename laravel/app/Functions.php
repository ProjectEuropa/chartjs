<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Functions{
    public static function getAreaName($prefecture_id, $city_id, $ward_id){
        $area_name = "";
        if($prefecture_id == 0){
            $area_name .= "全国";
        } else {
            $prefecture = DB::table('prefectures')->find($prefecture_id);
            $area_name .= $prefecture->name;
            if($city_id != 628 && $city_id != 0){
                $city = DB::table('cities')->find($city_id);
                $area_name .= $city->name;
            }
            if($ward_id != 0) {
                $ward = DB::table('wards')->find($ward_id);
                $area_name .= $ward->name;
            }
        }
        return $area_name;
    }

    public static function getPCRCounts($prefecture, $city, $ward, $type, $pcr_type){
        $query = 'select ymd, sum('.$pcr_type.'_user_count), sum('.$pcr_type.'_user_family_count), sum('.$pcr_type.'_staff_count), sum('.$pcr_type.'_staff_family_count) from input_records';
        if($type == "area"){
            if($prefecture == 0){
                $datas = DB::select($query.' where deleted_at is null group by ymd');
            } elseif($city == 0){
                $datas = DB::select($query.' inner join cities on input_records.city_id = cities.id where prefecture_id = ? and deleted_at is null group by ymd', [$prefecture]);
            } elseif($ward == 0){
                $datas = DB::select($query.' where city_id = ? and deleted_at is null group by ymd', [$city]);
            } else{
                $datas = DB::select($query.' where ward_id = ? and deleted_at is null group by ymd', [$ward]);
            }
        } elseif($type == "facility"){
            $datas = DB::select($query.' where facility_id = ? and deleted_at is null group by ymd', [Auth::user()->facility_id]);
        }
        return $datas;
    }

    public static function treatPCRCounts($datas, $start_day, $period_length, $data_type){
        $column_names = ['user_count', 'user_family_count', 'staff_count', 'staff_family_count'];
        
        foreach($column_names as $column_name){
            $sorted_var_name = 'sorted_' . $column_name;
            $raw_var_name = 'raw_' . $column_name;
            $$raw_var_name = array_column($datas, 'sum('.$data_type.'_' . $column_name . ')', 'ymd');

            for($i=0; $i < $period_length; $i++){
                $day = date('Y-m-d', strtotime("+{$i} day", strtotime($start_day)));
                if(array_key_exists($day, $$raw_var_name)){
                    $$sorted_var_name[$day] = $$raw_var_name[$day];
                } else {
                    $$sorted_var_name[$day] = 0;
                }
            }
            $js_var_name = 'js_' . $column_name;
            $$js_var_name = json_encode($$sorted_var_name);
        }
        return [$js_user_count, $js_user_family_count, $js_staff_count, $js_staff_family_count];
    }

    public static function getPCRRate($start_day, $end_day, $prefecture, $city, $ward, $type){
        if($type == "area"){
            if($prefecture == 0){
                $datas = DB::select('select ymd, sum(positive_user_count), sum(positive_user_family_count), sum(positive_staff_count), sum(positive_staff_family_count), sum(user_count), sum(user_family_count), sum(staff_count), sum(staff_family_count) from input_records where ymd >= ? and ymd <= ? and deleted_at is null group by ymd',[$start_day, $end_day]);
            } elseif($city == 0){
                $datas = DB::select('select ymd, sum(positive_user_count), sum(positive_user_family_count), sum(positive_staff_count), sum(positive_staff_family_count), sum(user_count), sum(user_family_count), sum(staff_count), sum(staff_family_count) from input_records inner join cities on input_records.city_id = cities.id where prefecture_id = ? and ymd >= ? and ymd <= ? and deleted_at is null group by ymd', [$prefecture, $start_day, $end_day]);
            } elseif($ward == 0){
                $datas = DB::select('select ymd, sum(positive_user_count), sum(positive_user_family_count), sum(positive_staff_count), sum(positive_staff_family_count), sum(user_count), sum(user_family_count), sum(staff_count), sum(staff_family_count) from input_records where city_id = ? and ymd >= ? and ymd <= ? and deleted_at is null group by ymd', [$city, $start_day, $end_day]);
            } else{
                $datas = DB::select('select ymd, sum(positive_user_count), sum(positive_user_family_count), sum(positive_staff_count), sum(positive_staff_family_count), sum(user_count), sum(user_family_count), sum(staff_count), sum(staff_family_count) from input_records where ward_id = ? and ymd >= ? and ymd <= ? and deleted_at is null group by ymd', [$ward, $start_day, $end_day]);
            }
        } elseif($type = "facility"){
            $datas = DB::select('select ymd, sum(positive_user_count), sum(positive_user_family_count), sum(positive_staff_count), sum(positive_staff_family_count), sum(user_count), sum(user_family_count), sum(staff_count), sum(staff_family_count) from input_records where facility_id = ? and ymd >= ? and ymd <= ? and deleted_at is null group by ymd', [Auth::user()->facility_id, $start_day, $end_day]);
        }
        return $datas;
    }

    public static function treatPCRRate($datas, $start_day, $period_length){
        $column_names = ['user_count', 'user_family_count', 'staff_count', 'staff_family_count'];

        foreach($column_names as $column_name){
            $sorted_var_name = 'sorted_' . $column_name;
            $nume_var_name = 'nume_' . $column_name;
            $denom_var_name = 'denom_' . $column_name;

            $$nume_var_name = array_column($datas, 'sum(positive_' . $column_name . ')', 'ymd');
            $$denom_var_name = array_column($datas, 'sum(' . $column_name . ')', 'ymd');
            
            $$sorted_var_name = array();
            $j=0;
            for($i=0; $i < $period_length; $i++){
                $day = date('Y-m-d', strtotime("+{$i} day", strtotime($start_day)));
                if(array_key_exists($day, $$denom_var_name)){
                    $$sorted_var_name[$j]['x'] = date('m/d', strtotime($day));
                    $$sorted_var_name[$j]['y'] = $$nume_var_name[$day] / $$denom_var_name[$day];
                    $j++;
                }
            }
            $js_var_name = 'js_' . $column_name;
            $$js_var_name = json_encode($$sorted_var_name);
        }
        return [$js_user_count, $js_user_family_count, $js_staff_count, $js_staff_family_count];
    }

    // public static function getPPECounts($prefecture, $city, $ward, $type, $ppe_type){

    //     $sorted_datas = array();

    //     $raw_datas = DB::table('input_records')->where('facility_id', Auth::user()->facility_id)->whereNull('deleted_at')->select('ymd', 'ppe_visit_count')->get();

        
    // }

}