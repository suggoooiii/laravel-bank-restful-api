<?php

namespace Database\Seeders;

use App\Models\Banknet;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BanknetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**The truncate operation will also reset any
         * auto-incrementing IDs on the model's
         *  associated table:
         */
        Banknet::truncate();
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 30; $i++) {
            Banknet::create([
                'id' => $faker->uuid,
                'name' => $faker->name,
            ]);
        }
    }
}
