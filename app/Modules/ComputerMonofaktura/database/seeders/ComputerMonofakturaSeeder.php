<?php

namespace App\Modules\ComputerMonofaktura\database\seeders;

use App\Modules\ComputerMonofaktura\Models\ComputerMonofaktura;
use Illuminate\Database\Seeder;

class ComputerMonofakturaSeeder extends Seeder
{

    public function run()
    {
        ComputerMonofaktura::factory(2)->create();
    }

}