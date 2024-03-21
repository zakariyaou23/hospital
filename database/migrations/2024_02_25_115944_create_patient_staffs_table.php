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
        Schema::create('patient_staffs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('record_id');
            $table->unsignedBigInteger('staff_id');
            $table->string('purpose');
            $table->boolean('with_patient')->default(true);
            $table->longText('note')->nullable();
            $table->string('in_time');
            $table->string('out_time')->nullable();
            $table->timestamps();
            $table->foreign('record_id')->references('id')->on('patient_records')->onDelete('cascade');
            $table->foreign('staff_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_staffs');
    }
};
