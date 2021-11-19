<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class computerPeripherals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computer_peripherals', function (Blueprint $table) {
            $table->id();
            $table->string('category_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->string('image')->nullable();
            $table->text('description_uz')->nullable();
            $table->text('description_oz')->nullable();
            $table->text('description_ru')->nullable();
            $table->integer('parent_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
    }
}
