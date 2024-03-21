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
        Schema::create('infrastructures', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type',['hospital','clinic','pharmacy','laboratory']);
            $table->string('emergency_number')->nullable();
            $table->string('rating')->nullable();
            $table->string('location');
            $table->unsignedBigInteger('subdivision_id');
            $table->foreign('subdivision_id')->references('id')->on('subdivisions')->onDelete('cascade');
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
        Schema::dropIfExists('infrastructures');
    }
};
