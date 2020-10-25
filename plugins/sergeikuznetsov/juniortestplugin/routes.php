<?php


Route::group(['prefix' => 'api'], function() {

    Route::get('items/list', '\SergeiKuznetsov\JuniorTestPlugin\Controllers\Categories@apiShow');
    Route::post('items/buy', '\SergeiKuznetsov\JuniorTestPlugin\Controllers\Buys@apiStore');
});
