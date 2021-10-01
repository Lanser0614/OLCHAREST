<?php

namespace App\Modules\Computers\database\seeders;


use App\Modules\Computers\Models\Computer;
use Illuminate\Database\Seeder;

class ComputerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Computer::factory(10)->create();

//        foreach (Computer::all() as $computer){
//            $product = Computer::inRandomOrder()->take(rand(1,5))->pluck('id');
//            $computer->computers()->attach($product);
//        }
    }
}
