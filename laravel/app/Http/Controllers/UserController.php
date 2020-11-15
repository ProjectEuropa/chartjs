<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', User::class);
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $this->authorize('viewAny', User::class);
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('users')->where('id', $request->id)->update(['name' => $request->name, 'email' => $request->email, 'user_type' => $request->user_type]);
        if($request->user_type != 1){
            DB::table('users')->where('id', $request->id)->update(['facility_id' => NULL]);
        }
        return redirect(route('user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', User::class);
        DB::table('users')->where('id', $id)->delete();
        return redirect(route('user.index'));
    }

    public function registerFacility($user_id){
        $this->authorize('viewAny', User::class);
        $prefectures = DB::table('prefectures')->get();
        return view('user.register_facility', compact('prefectures', 'user_id'));
    }

    public function registerFacilityUpdate(Request $request, $user_id){
        if($request->facility_id){
            DB::table('users')->where('id', $user_id)->update(['facility_id' => $request->facility_id]);
            return redirect(route('user.index'));
        } else{
            return '施設を選択してください';
        }
    }
}
