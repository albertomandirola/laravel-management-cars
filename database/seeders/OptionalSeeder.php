<?php

namespace Database\Seeders;

use App\Models\Optional;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class OptionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $optional = new Optional();
            $optional->name = $faker->word();
            $optional->price = $faker->randomFloat(2, 1, 1000);
            $optional->color = $faker->safeColorName();
            $optional->brand = $faker->numberBetween(1, 10);
            $optional->description = $faker->paragraph();

            $optional->save();
        }
    }
}
