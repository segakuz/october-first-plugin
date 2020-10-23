<?php

Route::group(['prefix' => 'api'], function() {

    Route::get('items/list', '\SergeiKuznetsov\JuniorTestPlugin\Controllers\Categories@apiShow');

});
