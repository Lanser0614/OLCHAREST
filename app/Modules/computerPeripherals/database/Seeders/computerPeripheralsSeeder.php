<?php

namespace App\Modules\computerPeripherals\database\Seeders;


use Illuminate\Database\Seeder;
use App\Modules\computerPeripherals\Models\computerPeripherals;

class computerPeripheralsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        computerPeripherals::factory(25)->create();
    }
}
