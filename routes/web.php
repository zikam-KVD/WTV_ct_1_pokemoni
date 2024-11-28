<?php

use App\Http\Controllers\PokemonController;
use App\Models\Pokemon;
use App\Models\Typ;
use Illuminate\Support\Facades\Route;

//Při navštívení url "/" se mi ze třídy PokemonController zavolá funkce ukazIndex.
Route::get('/', [PokemonController::class, 'ukazIndex']);

Route::get('/pokemon/{id}', [PokemonController::class, 'ukazDetail'])->name("detail");

//routa zobrazujici pokemony daneho typ podle ID
Route::get('/typ/{id}', function($id) {
    $typ = Typ::find($id);

    if($typ == null)
    {
        abort(404);
    }

    return view(
        'pokemoniPodleTypu',
        [
            'pokemoni' => $typ->pokemons,
            'nazevTypu' => $typ->nazev
    ]);
})->name("typy");
