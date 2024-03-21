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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('telephone')->nullable();
            $table->date('date_of_birth');
            $table->enum('gender',['Male','Female']);
            $table->string('national_identity_card')->unique()->nullable();
            $table->string('photo')->nullable();
            $table->boolean('account_status')->default(true);
            $table->string('address')->nullable();
            $table->unsignedBigInteger('subdivision_id')->nullable();
            $table->unsignedBigInteger('infrastructure_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('subdivision_id')->references('id')->on('subdivisions')->onDelete('cascade');
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
        Schema::dropIfExists('users');
    }
};
