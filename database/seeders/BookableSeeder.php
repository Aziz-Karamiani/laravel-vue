<?php

namespace Database\Seeders;

use App\Models\Bookable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bookable::factory()->times(100)->create();
    }
}
