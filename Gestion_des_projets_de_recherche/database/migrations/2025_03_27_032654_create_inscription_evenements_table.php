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
        Schema::create('inscription_evenements', function (Blueprint $table) {
            $table->unsignedBigInteger('inscription_evenements_id')->primary()->autoIncrement();
            $table->unsignedBigInteger('evenements_id');
            $table->foreign('evenements_id')->references('evenements_id')->on('evenements')->onDelete('cascade');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('users_id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscription_evenements');
    }
};
