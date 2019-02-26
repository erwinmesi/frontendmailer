<?php

use Illuminate\Http\Request;

Route::namespace('API')->group(function () {
  Route::post('send-email', 'EmailController@index');
});