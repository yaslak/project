<?php

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
// language chooser
Route::post('/language-chooser','App\LanguageController@changeLanguage');
Route::post('/language/',array(
    'before' => 'csrf',
    'as' => 'language-chooser',
    'uses' => 'App\LanguageController@changeLanguage'
));

// home
Route::get('/', 'Home\HomeController@index')->name('home');

// auth

Auth::routes();

// conditions

Route::get('conditions', function (){
    return view('conditions.conditions');
})->name('conditions');

// Permissions

Route::post('permissions','Permissions\PermissionsController@index')->name('permissions');

// password
Route::namespace('Auth\Password')->prefix('password')->middleware('guest')->group(function (){Route::get('target','TargetController@index')->name('reset.target.show');
    Route::put('target','TargetController@store')->name('reset.target.store');
    Route::get('last_password/{token}','last_passwordController@index')->name('reset.lp.show');
    Route::put('last_password/{token}','last_passwordController@store')->name('reset.lp.store');
    Route::get('sq/{token}','sqController@index')->name('reset.sq.show');
    Route::put('sq/{token}','sqController@store')->name('reset.sq.store');
    Route::get('mail/{token}','mailController@index')->name('reset.mail.show');
    Route::put('mail/{token}','mailController@store')->name('reset.mail.store');
    Route::get('newPassword/{token}','NpswController@index')->name('reset.npsw.show');
    Route::put('newPassword/{token}','NpswController@store')->name('reset.npsw.store');
});

// Recover
Route::group(['prefix'=>'recover'], function (){
    Route::get('recover','Auth\Recover\RecoverController@index')->name('recover.recover');
    Route::put('recover','Auth\Recover\RecoverController@store')->name('recover.store');
    Route::get('mail','Auth\Recover\MailController@index')->name('recoverMail.show');
    Route::post('mail','Auth\Recover\MailController@return')->name('recoverMail.return');
    Route::put('mail','Auth\Recover\MailController@store')->name('recoverMail.store');
    Route::get('sq','Auth\Recover\SqController@show')->name('recoverSq.show');
    Route::post('sq','Auth\Recover\SqController@store')->name('recoverSq.store');
    Route::put('sq','Auth\Recover\SqController@update')->name('recoverSq.update');
});

// profil

Route::prefix('membre')->namespace('Membre')->middleware('auth')->group(function (){
    Route::get('profil','ProfilController@index')->name('profil');
});

/*
    TODO::template
    TODO::layout.
    TODO::content
    TODO::errors
    TODO::msg
    TODO::alerte
    TODO::top
    TODO::left
    TODO::right
    TODO::bottom
*/