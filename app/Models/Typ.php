<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Typ extends Model
{
    protected $table = "types";
    protected $fillable = ["nazev", "barva"];

    //TODO: přihlašování a autorizace uživatele
    public function pokemons()
    {
        return $this->hasMany(Pokemon::class, "druh", "id");
    }
}
