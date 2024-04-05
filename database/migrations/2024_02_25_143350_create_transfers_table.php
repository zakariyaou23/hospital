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
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('from_infrastructure_id');
            $table->unsignedBigInteger('initiator_id');
            $table->unsignedBigInteger('to_infrastructure_id');
            $table->unsignedBigInteger('recipient_id')->nullable();
            $table->enum('status',['pending','success','failed'])->default('pending');
            $table->text('reason')->nullable();
            $table->text('note');
            $table->timestamps();
            $table->foreign('patient_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('initiator_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('recipient_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('from_infrastructure_id')->references('id')->on('infrastructures')->onDelete('cascade');
            $table->foreign('to_infrastructure_id')->references('id')->on('infrastructures')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfers');
    }
};
