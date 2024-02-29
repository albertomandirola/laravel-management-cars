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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->unique();
            $table->string('country', 50)->nullable();
            $table->integer('year',)->nullable();
            $table->string('phone_number', 30);
            $table->string('email_address', 50);
            $table->string('logo')->nullable();
            $table->text('description')->nullable();
            $table->string('slug', 100);
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
        Schema::dropIfExists('brands');
    }
};
