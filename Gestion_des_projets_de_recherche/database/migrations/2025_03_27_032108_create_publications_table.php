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
        Schema::create('publications', function (Blueprint $table) {
            $table->unsignedBigInteger('publications_id')->primary()->autoIncrement();
            $table->unsignedBigInteger('chercheurs_id');
            $table->foreign('chercheurs_id')->references('chercheurs_id')->on('chercheurs')->onDelete('cascade');
            $table->string('titre');
            $table->text('resume');
            $table->string('lien')->nullable();
            $table->unsignedBigInteger('domaines_recherche_id');
            $table->foreign('domaines_recherche_id')->references('domaines_recherche_id')->on('domaines_recherche')->onDelete('cascade');
            $table->string('fichier_pdf')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publications');
    }
};
