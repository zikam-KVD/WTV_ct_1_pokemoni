<?php

use App\Http\Controllers\PokemonController;
use App\Models\Pokemon;
use App\Models\Typ;
use Illuminate\Support\Facades\Route;

//Na příště - udělat route pro pokemonm/id ve web.php

//Nový route udělat čistě v Controlleru
// -> nic nepřepisovat, ukázat to na novém

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //routa zobrazujici typy na strance po prihlaseni
    Route::get(
        '/admin/typy',
        [PokemonController::class, 'zobrazTypy']
    )->name('admin.typy');

    //routa, pomoci ktere budeme pridat typ pokemona
    Route::post(
        '/admin/typ/pridej',
        [PokemonController::class, 'pridejTyp']
    )->name('admin.pridejTyp');

    Route::get(
        '/admin/pokemoni',
        [PokemonController::class, 'zobrazPokemoni']
    )->name('admin.pokemoni');

    //routa, pomoci ktere budeme pridat typ pokemona
    Route::post(
        '/admin/pokemon/pridej',
        [PokemonController::class, 'pridejPokemona']
    )->name('admin.pridejPokemona');
});
