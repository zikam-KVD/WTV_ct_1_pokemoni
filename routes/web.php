<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bulbasaur', function() {
    return view('bulbasaur');
});
