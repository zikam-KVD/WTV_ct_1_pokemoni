<?php

use App\Models\Pokemon;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $poke = Pokemon::all();

    return view('welcome', ['digimoni' => $poke]);
});

Route::get('/pokemon/{id}', function($id) {
    $pokemon = Pokemon::find($id);

    return view('detail', ['pokemon' => $pokemon]);
})->name("detail");
