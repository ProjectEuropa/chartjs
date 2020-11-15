<?php

namespace App\Http\Controllers;

use App\User;
use App\InputRecord;
use App\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class InputRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $facility_id = Auth::user()->facility->id;
        $count = DB::table('input_records')->where('facility_id', $facility_id)->count();
        if($count >= 1){
            $latest = DB::table('input_records')->where('facility_id', $facility_id)->orderBy('updated_at', 'desc')->first();
            $exist_latest = 1;
        }else{
            $latest = '';
            $exist_latest = 0;
        }
        $date = $request->date;

        $area_name = Auth::user()->facility->city->prefecture->name;
        $area_name .= Auth::user()->facility->city->name;
        if(Auth::user()->facility->ward){
            $area_name .= Auth::user()->facility->ward->name; 
        }

        $city_id = Facility::find($facility_id)->city->id;
        
        if(Facility::find($facility_id)->ward_id){
            $ward_id = Facility::find($facility_id)->ward->id;
        } else {
            $ward_id = 0;
        }


        return view('input_record.create', compact('latest', 'exist_latest', 'date', 'area_name', 'facility_id', 'city_id', 'ward_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input_record = new InputRecord;
        $input_record->ymd = $request->ymd;
        $input_record->facility_id = $request->facility_id;
        $input_record->city_id = $request->city_id;
        $input_record->ward_id = $request->ward_id;
        $input_record->user_count = $request->user_count;
        $input_record->user_family_count = $request->user_family_count;
        $input_record->staff_count = $request->staff_count;
        $input_record->staff_family_count = $request->staff_family_count;
        $input_record->positive_user_count = $request->positive_user_count;
        $input_record->positive_user_family_count = $request->positive_user_family_count;
        $input_record->positive_staff_count = $request->positive_staff_count;
        $input_record->positive_staff_family_count = $request->positive_staff_family_count;
        $input_record->target_user_count = $request->target_user_count;
        $input_record->target_user_family_count = $request->target_user_family_count;
        $input_record->target_staff_count = $request->target_staff_count;
        $input_record->target_staff_family_count = $request->target_staff_family_count;
        $input_record->ppe_visit_count = $request->ppe_visit_count;
        $input_record->ppe_used_count = $request->ppe_used_count;
        $input_record->answer_to_q1_1 = $request->answer_to_q1_1;
        $input_record->answer_to_q1_2 = $request->answer_to_q1_2;
        $input_record->answer_to_q1_3 = $request->answer_to_q1_3;
        $input_record->answer_to_q1_4 = $request->answer_to_q1_4;
        $input_record->answer_to_q1_5 = $request->answer_to_q1_5;
        $input_record->answer_to_q2_1 = $request->answer_to_q2_1;
        $input_record->answer_to_q2_2 = $request->answer_to_q2_2;
        $input_record->answer_to_q2_3 = $request->answer_to_q2_3;
        $input_record->answer_to_q2_4 = $request->answer_to_q2_4;
        $input_record->save();

        return redirect('/');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($date)
    {
        $facility_id = Auth::user()->facility->id;
        $latest = DB::table('input_records')->where('facility_id', $facility_id)->where('ymd', $date)->first();

        $area_name = Auth::user()->facility->city->prefecture->name;
        $area_name .= Auth::user()->facility->city->name;
        if(Auth::user()->facility->ward){
            $area_name .= Auth::user()->facility->ward->name; 
        }

        $city_id = Facility::find($facility_id)->city->id;
        $ward_id = Facility::find($facility_id)->ward->id;

        return view('input_record.edit', compact('latest', 'date', 'area_name', 'facility_id', 'city_id', 'ward_id'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $date)
    {
        $facility_id = Auth::user()->facility->id;
        $input_record = InputRecord::where('facility_id', $facility_id)->where('ymd', $date)->first();
        $input_record->ymd = $request->ymd;
        $input_record->facility_id = $request->facility_id;
        $input_record->city_id = $request->city_id;
        $input_record->ward_id = $request->ward_id;
        $input_record->user_count = $request->user_count;
        $input_record->user_family_count = $request->user_family_count;
        $input_record->staff_count = $request->staff_count;
        $input_record->staff_family_count = $request->staff_family_count;
        $input_record->positive_user_count = $request->positive_user_count;
        $input_record->positive_user_family_count = $request->positive_user_family_count;
        $input_record->positive_staff_count = $request->positive_staff_count;
        $input_record->positive_staff_family_count = $request->positive_staff_family_count;
        $input_record->target_user_count = $request->target_user_count;
        $input_record->target_user_family_count = $request->target_user_family_count;
        $input_record->target_staff_count = $request->target_staff_count;
        $input_record->target_staff_family_count = $request->target_staff_family_count;
        $input_record->ppe_visit_count = $request->ppe_visit_count;
        $input_record->ppe_used_count = $request->ppe_used_count;
        $input_record->answer_to_q1_1 = $request->answer_to_q1_1;
        $input_record->answer_to_q1_2 = $request->answer_to_q1_2;
        $input_record->answer_to_q1_3 = $request->answer_to_q1_3;
        $input_record->answer_to_q1_4 = $request->answer_to_q1_4;
        $input_record->answer_to_q1_5 = $request->answer_to_q1_5;
        $input_record->answer_to_q2_1 = $request->answer_to_q2_1;
        $input_record->answer_to_q2_2 = $request->answer_to_q2_2;
        $input_record->answer_to_q2_3 = $request->answer_to_q2_3;
        $input_record->answer_to_q2_4 = $request->answer_to_q2_4;
        $input_record->save();

        return redirect('/mypage?page=1');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
