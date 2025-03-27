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
        Schema::create('projets_recherche', function (Blueprint $table) {
            $table->unsignedBigInteger('projets_recherche_id')->primary()->autoIncrement();
            $table->unsignedBigInteger('chercheurs_id');
            $table->foreign('chercheurs_id')->references('chercheurs_id')->on('chercheurs')->onDelete('cascade');
            $table->string('titre');
            $table->text('description');
            $table->string('financement')->nullable();
            $table->enum('etat', ['en cours', 'terminé'])->default('en cours');
            $table->date('date_debut');
            $table->date('date_fin')->nullable();
            $table->string('equipe_recherche')->nullable(); // Ajout de l'équipe de recherche

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projets_recherche');
    }
};
