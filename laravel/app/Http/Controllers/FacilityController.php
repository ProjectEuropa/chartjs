<?php

namespace App\Http\Controllers;

use App\Facility;
use App\Prefecture;
use App\InputRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Facility::class);
        $facilities = Facility::all();
        return view('facility.index', compact('facilities'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Facility::class);
        $prefectures = Prefecture::all();
        return view('facility.create', compact('prefectures'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $facility = new Facility;
        $facility->name = $request->name;
        $facility->city_id = $request->city_id;
        $facility->ward_id = $request->ward_id;
        $facility->type_id = $request->type_id;
        $facility->save();
        return redirect(route('facility.index'));
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
    public function edit($id)
    {
        $facility = Facility::find($id);
        $prefectures = DB::table('prefectures')->get();
        return view('facility.edit', compact('facility', 'prefectures'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('facilities')->where('id', $request->id)->update(['name' => $request->name, 'type_id' => $request->type_id]);
        return redirect(route('facility.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Facility::class);
        DB::table('facilities')->where('id', $id)->delete();
        InputRecord::where('facility_id', $id)->delete();
        return redirect(route('facility.index'));
    }
}
