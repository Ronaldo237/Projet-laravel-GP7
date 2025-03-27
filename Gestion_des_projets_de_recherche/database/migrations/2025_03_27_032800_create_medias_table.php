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
        Schema::create('medias', function (Blueprint $table) {
            $table->unsignedBigInteger('medias_id')->primary()->autoIncrement();
            $table->unsignedBigInteger('chercheurs_id');
            $table->foreign('chercheurs_id')->references('chercheurs_id')->on('chercheurs')->onDelete('cascade');
            $table->enum('type', ['video', 'interview', 'présentation']);
            $table->string('url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medias');
    }
};
