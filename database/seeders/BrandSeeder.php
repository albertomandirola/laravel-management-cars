<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Brand;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $brand = new Brand();
            $brand->name = $faker->company();
            $brand->country = $faker->country();
            $brand->year = $faker->year();
            $brand->phone_number = $faker->phoneNumber();
            $brand->email_address = $faker->companyEmail();
            $brand->description = $faker->paragraph();
            $brand->slug = Str::slug($brand->name, '-');

            $brand->save();
        }
    }
}
