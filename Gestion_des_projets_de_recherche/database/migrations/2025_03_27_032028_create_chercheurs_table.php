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
        Schema::create('chercheurs', function (Blueprint $table) {
            $table->unsignedBigInteger('chercheurs_id')->primary()->autoIncrement();
            $table->string('photo')->nullable();
            $table->text('biographie')->nullable();
            $table->text('cv')->nullable();
            $table->string('google_scholar')->nullable();
            $table->string('linkedin')->nullable();
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('users_id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('domaines_recherche_id');
            $table->foreign('domaines_recherche_id')->references('domaines_recherche_id')->on('domaines_recherche')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chercheurs');
    }
};
