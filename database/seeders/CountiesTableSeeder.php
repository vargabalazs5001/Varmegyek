<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\County;

class CountiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $counties = ['Pest', 'Baranya', 'Borsod-Abaúj-Zemplén'];

        foreach ($counties as $county) {
            County::create(['name' => $county]);
    }
    }
}
