<?php

namespace Database\Seeders;

use App\Models\Pokemon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class insert_pokemons extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //["nazev", "popis", "druh"]

        $pokemons = [
                ["nazev" => "Bulbasaur", "popis" => "Tohle je nejlepší pokémon", "druh" => 3],
                ["nazev" => "Charmander", "popis" => "Tohle je nejteplejší pokémon", "druh" => 2],
                ["nazev" => "Squirtle", "popis" => "Tohle je nejmokřejší pokémon", "druh" => 1],
            ];

        //Procházím pole polí a postupně vkládám do DB pokémony
        foreach($pokemons as $pokemon)
        {
            Pokemon::insert([
                "nazev" => $pokemon["nazev"],
                "popis" => $pokemon["popis"],
                "druh" => $pokemon["druh"],
            ]);
        }
    }
}
