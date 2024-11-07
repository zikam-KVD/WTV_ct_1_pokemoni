<?php

namespace Database\Seeders;

use App\Models\Typ;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class insert_types extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Typ::create(
            [
                ["nazev" => "vodní", "barva" => "#1e90ff"],
                ["nazev" => "ohnivý", "barva" => "#800000"],
                ["nazev" => "travnatý", "barva" => "#006400"],
            ]
        );
    }
}
