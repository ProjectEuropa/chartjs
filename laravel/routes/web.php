<?php

use App\InputRecord;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/', 'HomeController@index')->name('index');
Route::get('/home', 'HomeController@home')->name('home');
Route::get('/', 'HomeController@mypage')->name('mypage')->middleware('auth');
Route::get('/user/{user_id}/register_facility', 'UserController@registerFacility')->name('register_facility');
Route::post('/user/{user_id}/register_facility', 'UserController@registerFacilityUpdate')->name('register_facility_update');
Route::get('/pcr/{data_type}/{graph_type}/{chart_type}', 'ChartController@PCRChart')->name('pcr_chart');
Route::get('/ppe/{data_type}/{chart_type}', 'ChartController@PPEChart')->name('ppe_chart');
Route::get('/questionnaire/{data_type}/{chart_type}', 'ChartController@questionnaireChart')->name('questionnaire_chart');
Route::get('/admin/facilities/', 'HomeController@facilitiesIndex')->name('facilities_index');

Route::get('/ajax/prefecture/{prefecture}', 'HomeController@ajaxCities');
Route::get('/ajax/city/{city}', 'HomeController@ajaxWards');
Route::get('/ajax/facility/city/{city}', 'HomeController@ajaxFacilitiesCity');
Route::get('/ajax/facility/ward/{ward}', 'HomeController@ajaxFacilitiesWard');

Route::resource('user', 'UserController');
Route::resource('input_record', 'InputRecordController');
Route::resource('facility', 'FacilityController');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/contents/softdelete/get', function() {
    $content = InputRecord::onlyTrashed()->whereNotNull('id')->get();

    dd($content);
});
