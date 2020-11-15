<?php

namespace App\Http\Controllers;

use App\User;
use App\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    public function home()
    {
        return view('home');
    }

    public function mypage(Request $request)
    {
        if($request->year){
            $year = $request->year;
        } else{
            $year = date('Y');
        }
        if($request->month){
            $month = $request->month;
        } else{
            $month = date('m');
        }
        $first_day = $year.'-'.$month.'-01';
        $days = date('t', strtotime($first_day));
        $last_day = $year.'-'.$month.'-'.$days;
        $today = date('Y-m-d');

        if($request->page){
            $page = $request->page;
        } else {
            $page = 1;
        }
        

        $one_month_before_year = date('Y', strtotime('-1 month', strtotime($first_day)));
        $one_month_before_month = date('m', strtotime('-1 month', strtotime($first_day)));
        $one_month_after_year = date('Y', strtotime('+1 month', strtotime($first_day)));
        $one_month_after_month = date('m', strtotime('+1 month', strtotime($first_day)));

        $datas = DB::select('select ymd,user_count,user_family_count,staff_count,staff_family_count,positive_user_count,positive_user_family_count,positive_staff_count,positive_staff_family_count,target_user_count,target_user_family_count,target_staff_count,target_staff_family_count,ppe_visit_count,ppe_used_count,answer_to_q1_1,answer_to_q1_2,answer_to_q1_3,answer_to_q1_4,answer_to_q1_5,answer_to_q2_1,answer_to_q2_2,answer_to_q2_3,answer_to_q2_4 from input_records where facility_id = ? and ymd >= ? and ymd <= ?',[Auth::user()->facility_id,$first_day,$last_day]);
        $columns = ['ymd','user_count','user_family_count','staff_count','staff_family_count','positive_user_count','positive_user_family_count','positive_staff_count','positive_staff_family_count','target_user_count','target_user_family_count','target_staff_count','target_staff_family_count','ppe_visit_count','ppe_used_count','answer_to_q1_1','answer_to_q1_2','answer_to_q1_3','answer_to_q1_4','answer_to_q1_5','answer_to_q2_1','answer_to_q2_2','answer_to_q2_3','answer_to_q2_4'];

        $sorted_datas = array();

        foreach($datas as $data){
            foreach($columns as $column){
                $sorted_datas[$data->ymd][$column] = $data->$column;
            }
            $sorted_datas[$data->ymd]['has_record'] = 1;
        }
        
        for($i=0; $i < $days; $i++){
            $day = date('Y-m-d', strtotime("+{$i} day", strtotime($first_day)));
            if(!array_key_exists($day, $sorted_datas)){
                foreach($columns as $column){
                    $sorted_datas[$day][$column] = '';
                }
                $sorted_datas[$day]['ymd'] = $day;
                $sorted_datas[$day]['has_record'] = 0;
            }
        }
        ksort($sorted_datas);

        return view('mypage', compact('first_day', 'last_day', 'today', 'datas', 'days','sorted_datas', 'year', 'month', 'one_month_before_year', 'one_month_before_month', 'one_month_after_year', 'one_month_after_month','page'));
    }

    public function ajaxCities($prefecture)
    {
        $cities = DB::table('cities')->where('prefecture_id', $prefecture)->get();
        $js_cities = json_encode($cities);

        return $js_cities;
    }

    public function ajaxWards($city)
    {
        $wards = DB::table('wards')->where('city_id', $city)->get();
        $js_wards = json_encode($wards);

        return $js_wards;
    }

    public function ajaxFacilitiesCity($city)
    {
        $facilities = DB::table('facilities')->where('city_id', $city)->get();
        $js_facilities = json_encode($facilities);

        return $js_facilities;
    }

    public function ajaxFacilitiesWard($ward)
    {
        $facilities = DB::table('facilities')->where('ward_id', $ward)->get();
        $js_facilities = json_encode($facilities);

        return $js_facilities;
    }
}
