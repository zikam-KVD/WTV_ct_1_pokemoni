<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Typ extends Model
{
    protected $table = "types";
    protected $fillable = ["nazev", "barva"];

    //TODO: pokemons pro vypis vsech pokemonu daneho typu
    //TODO: npm run build
    public function pokemon()
    {
        return $this->hasMany(Pokemon::class, "druh", "id");
    }
}
