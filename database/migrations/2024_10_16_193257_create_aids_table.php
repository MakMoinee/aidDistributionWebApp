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
        Schema::create('aids', function (Blueprint $table) {
            $table->id('aidId')->autoIncrement();
            $table->integer('userID')->nullable(false);
            $table->string('name')->nullable(false);
            $table->string('purpose')->nullable(false);
            $table->string('documents')->nullable(false);
            $table->decimal('amount', 10, 2)->nullable(false);
            $table->string('paymentAddress')->nullable(false);
            $table->string('letter')->nullable(true);
            $table->string('category')->nullable(true);
            $table->string('priority')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aids');
    }
};
