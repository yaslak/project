<?php
Route::get('/dlfqdskjghlqkdsfghlqkdfjhgqdhfglkjqdhfgkjhqdfkljghlqkdfghlkqf/{url}','App\LayoutController@index')->name('layout');

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
    Route::get('/', 'Home\HomeController@index')->middleware('recovred')->middleware('layout')->name('home');

// auth
    Auth::routes();

// conditions

    Route::get('conditions', function (){
        return view('conditions.conditions');
    })->name('conditions');

// Permissions

    Route::post('permissions','Permissions\PermissionsController@index')->name('permissions');

// password
    Route::namespace('Auth\Password')->prefix('password')->middleware('guest')->middleware('layout')->group(function (){Route::get('target','TargetController@index')->name('reset.target.show');
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
    Route::namespace('Auth\Recover')->prefix('recover')->middleware('layout')->group( function (){
        Route::get('recover','RecoverController@index')->name('recover.recover');
        Route::put('recover','RecoverController@store')->name('recover.store');
        Route::get('mail','MailController@index')->name('recoverMail.show');
        Route::post('mail','MailController@return')->name('recoverMail.return');
        Route::put('mail','MailController@store')->name('recoverMail.store');
        Route::get('sq','SqController@show')->name('recoverSq.show');
        Route::post('sq','SqController@store')->name('recoverSq.store');
        Route::put('sq','SqController@update')->name('recoverSq.update');
    });

// profil

    Route::prefix('membre')->namespace('Membre')->middleware('auth')->group(function (){
        Route::get('profil/{slug?}','ProfilController@index')->name('profil');
        Route::put('profil','ProfilController@update')->name('profil-update');
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