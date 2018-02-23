<?php

function password(){
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
}

function recover(){
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
}
