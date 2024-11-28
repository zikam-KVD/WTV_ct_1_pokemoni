<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    //Tahle funkce mi vrací pohled welcom při navštívení url "/".
    public function ukazIndex() {
        $poke = Pokemon::all();

        return view('welcome', ['digimoni' => $poke]);
    }

    public function ukazDetail($id) {
        $pokemon = Pokemon::find($id);

        if($pokemon == null)
        {
            abort(404);
        }

        return view(
            'detail',
            ['pokemon' => $pokemon]);
    }
}
