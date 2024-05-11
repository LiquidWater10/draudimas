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
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->string("name", 32);
            $table->string("surname", 64);
            $table->string("phone", 32)->nullable()->default(null);
            $table->string("email", 64)->nullable()->default(null);
            $table->string("address", 100);
            $table->foreignId('user_id')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owners');
    }
};
