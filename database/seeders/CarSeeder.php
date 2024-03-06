<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use App\Models\Car;
use Illuminate\Support\Str;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 25; $i++) {
            $new_car = new Car();

            $new_car->model = $faker->word;
            $new_car->year = $faker->numberBetween(2000, 2022);
            $new_car->type_of_engine = $faker->word;
            $new_car->plate = $faker->optional()->numberBetween(1, 9999999); 
            $new_car->type_of_gear = $faker->word;
            $new_car->n_chassis = $faker->optional()->numberBetween(1, 99999999999999999);
            $new_car->price = $faker->randomFloat(2, 1000, 50000);
            $new_car->doors = $faker->numberBetween(2, 5);
            $new_car->seats = $faker->numberBetween(2, 7);
            $new_car->color = $faker->colorName;
            $new_car->power = $faker->numberBetween(50, 500);
            $new_car->description = $faker->paragraph;
            $new_car->slug = Str::slug($new_car->model, '-');

            $new_car->save();
        }

    }
}
