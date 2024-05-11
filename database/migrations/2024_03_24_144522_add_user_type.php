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
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_type')->nullable()->default(null);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->integer('type')->default(0);//0 - vartotojas, 1 - skaitantis vartotojas, 2 - administartorius
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('user_type');
        });

        Schema::table('users',function ( Blueprint $table){
            $table->dropColumn('type');
        });
    }
};
