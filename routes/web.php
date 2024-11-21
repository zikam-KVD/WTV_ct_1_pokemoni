<?php

use App\Models\Pokemon;
use App\Models\Typ;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $poke = Pokemon::all();

    return view('welcome', ['digimoni' => $poke]);
});

Route::get('/pokemon/{id}', function($id) {
    $pokemon = Pokemon::find($id);

    if($pokemon == null)
    {
        abort(404);
    }

    //$typ = Typ::find($pokemon->druh);
    $typ = null;

    return view(
        'detail',
        ['pokemon' => $pokemon, 'typ' => $typ]);
})->name("detail");
