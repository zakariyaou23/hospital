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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->string('name');
            $table->string('phone');
            $table->string('in_time');
            $table->date('in_date');
            $table->string('out_time')->nullable();
            $table->date('out_date')->nullable();
            $table->longText('note')->nullable();
            $table->unsignedBigInteger('infrastructure_id');
            $table->timestamps();
            $table->foreign('patient_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('infrastructure_id')->references('id')->on('infrastructures')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitors');
    }
};
