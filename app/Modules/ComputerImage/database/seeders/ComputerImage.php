<?php


namespace App\Modules\ComputerImage\database\seeders;

use App\Modules\ComputerImage\Models\ComputerImage as ModelsComputerImage;
use Illuminate\Database\Seeder;

class ComputerImage extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       ModelsComputerImage::factory(10)->create();
    }
}
