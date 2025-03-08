<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personal_details', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('userID')->nullable(false);
            $table->string('firstName')->nullable(false);
            $table->string('middleName')->nullable(false);
            $table->string('lastName')->nullable(false);
            $table->string('address')->nullable(false);
            $table->date('birthDate')->nullable(false);
            $table->string('contactNumber')->nullable(false);
            $table->string('documents')->nullable(false);
            $table->string('status')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_details');
    }
};
