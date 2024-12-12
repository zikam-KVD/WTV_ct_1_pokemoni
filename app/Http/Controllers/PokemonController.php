<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\Typ;
use Exception;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    //Tahle funkce mi vrací pohled welcom při navštívení url "/".
    public function ukazIndex() {
        $poke = Pokemon::all();

        return view('welcome', ['digimoni' => $poke]);
    }

    //zobrazuje detail pokemona na adrese http://127.0.0.1:8000/pokemon/$id
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

    //zobrazuje po přihlášení typy pokemonu
    public function zobrazTypy()
    {
        $typy = Typ::all();

        return view('admin-typy', ['typy' => $typy]);
    }

    //zobrazuje po přihlášení pokemony
    public function zobrazPokemoni()
    {
        $typy = Typ::all();
        $pokemons = Pokemon::all();

        return view(
            'admin-pokemon',
            ['typy' => $typy, 'pokemons' => $pokemons]
        );
    }

    public function pridejTyp(Request $request)
    {
        try {
            $val = $request->validate([
                "typ-nazev" => "required|min:5|max:24|unique:types,nazev",
                'typ-barva' => 'required|hex_color',
            ]);

            Typ::insert([
                "nazev" => $val["typ-nazev"],
                "barva" => $request["typ-barva"]
            ]);

            return back()->with("message", "Hele, udělal jsi typ " . $val["typ-nazev"]);
        } catch(Exception $e) {
            return back()->with("message", "Chyba: " . $e->getMessage());
        }
    }

    public function pridejPokemona(Request $request)
    {
            $val = $request->validate([
                "nazev" => "required|min:5|max:24|unique:pokemons,nazev",
                'popis' => 'required|min:5|max:24',
                "obrazek" => "required|mimes:png",
                'typ' => 'required|exists:types,id',
            ]);

            Pokemon::insert([
                "nazev" => $val["nazev"],
                "popis" => $val["popis"],
                "druh" => $val["typ"],
            ]);

            $obr = $request->file("obrazek");

            $obr->move(
                public_path() . "/images",
                $val["nazev"] . "." . $obr->getClientOriginalExtension(),
            );

            return back()->with("message", "Hele, udělal jsi pokémona " . $val["nazev"]);

    }
}
