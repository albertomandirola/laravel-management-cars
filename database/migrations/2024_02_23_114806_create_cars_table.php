<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('model', 50);
            $table->string('brand', 30);
            $table->integer('year');
            $table->string('type_of_engine');
            $table->string('plate', 7)->nullable()->unique();
            $table->string('type_of_gear', 30);
            $table->string('n_chassis', 17)->nullable()->unique();
            $table->float('price', 8, 2);
            $table->integer('doors');
            $table->integer('seats');
            $table->string('color', 20);
            $table->integer('power');
            $table->string('photos', 255)->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('cars');
    }
};
