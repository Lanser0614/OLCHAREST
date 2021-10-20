<?php

namespace Database\Seeders;

use App\Modules\AskCall\database\seeders\AskCallSeeder;
use App\Modules\Authors\database\seeders\AuthorSeeder;
use App\Modules\Authors\Models\Author;
use App\Modules\Books\database\factories\BookFactory;
use App\Modules\Books\database\seeders\BookSeeder;
use App\Modules\Books\Models\Books;
use App\Modules\CategoryForComputer\database\seeders\CategoryForComputerSeeder;
use App\Modules\ComputerForProgram\database\seeders\ComputerForProgramSeeder;
use App\Modules\ComputerForSale\database\seeders\ComputerForSaleSeeder;
use App\Modules\ComputerImage\database\seeders\ComputerImage;
use App\Modules\ComputerMonofaktura\database\seeders\ComputerMonofakturaSeeder;
use App\Modules\Computers\database\seeders\ComputerSeeder;
use App\Modules\EmailFeedback\database\seeders\EmailFeedbackSeeder;
use App\Modules\FeedbackComputer\database\seeders\FeedbackSeeder;
use App\Modules\ProductForComputer\database\seeders\ProductForComputerSeeder;
use App\Modules\Programs\database\seeders\ProgramSeeder;
use App\Modules\RelatedProduct\database\seeders\RelatedProductSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    //  $this->call(BookSeeder::class);
    //  $this->call(UserSeeder::class);
    // $this->call(ProgramSeeder::class);
    //  $this->call(ProductForComputerSeeder::class);
     // $this->call(ComputerSeeder::class);
    //  $this->call(ComputerForSaleSeeder::class);
    //  $this->call(ComputerForProgramSeeder::class);
    //  $this->call(RelatedProductSeeder::class);
    //  $this->call(CategoryForComputerSeeder::class);
    // $this->call(ComputerMonofakturaSeeder::class);
      $this->call(FeedbackSeeder::class);
    //  $this->call(AskCallSeeder::class);
    //     $this->call(EmailFeedbackSeeder::class);
     //   $this->call(ComputerImage::class);
    }
}
