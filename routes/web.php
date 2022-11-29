<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
Auth::routes();
Route::group(['middleware' => ['guest']], function () {

    Route::get('/', function () {
        return view('auth.login');
    });

});
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ,'auth' ]
    ], function(){ 
        Route::group(['namespace'=>'Section'],function(){
            Route::resource('section','SectionController');
            Route::resource('room','RoomController');
        });

        Route::group(['namespace'=>'Doctor'],function(){
            Route::resource('doctor','DocterController');
            Route::get('delete/{id}','DocterController@delete_attch')->name('doctor.delete_attch');
            Route::get('open_file/{id}','DocterController@open_file')->name('doctor.open_file');
            Route::get('download/{id}','DocterController@download')->name('doctor.download');
        });

        Route::group(['namespace'=>'Nurse'],function(){
            Route::resource('nurse','NurseController');
            Route::get('deleteN/{id}','NurseController@delete_attch')->name('nurse.delete_attch');
            Route::get('open_fileN/{id}','NurseController@open_file')->name('nurse.open_file');
            Route::get('downloadN/{id}','NurseController@download')->name('nurse.download');
        });

        Route::group(['namespace'=>'Patient'],function(){
            Route::resource('patient','PatientController');
        });
        
        Route::get('/dashboard', 'HomeController@index')->name('dashboard');        
    });

