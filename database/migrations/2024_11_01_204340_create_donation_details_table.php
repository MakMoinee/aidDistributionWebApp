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
        Schema::create('donation_details', function (Blueprint $table) {
            $table->id('donationDetailId')->autoIncrement();
            $table->integer('userID')->nullable(false);
            $table->integer('aidID')->nullable(false);
            $table->string('hash')->nullable(false);
            $table->string('from')->nullable(false);
            $table->string('to')->nullable(false);
            $table->decimal('eth', 10, 7)->nullable(false);
            $table->decimal('amount', 10, 2)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donation_details');
    }
};
