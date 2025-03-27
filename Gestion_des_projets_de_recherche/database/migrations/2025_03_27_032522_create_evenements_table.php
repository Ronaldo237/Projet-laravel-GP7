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
        Schema::create('evenements', function (Blueprint $table) {
            $table->unsignedBigInteger('evenements_id')->primary()->autoIncrement();
            $table->string('titre');
            $table->text('description');
            $table->date('date');
            $table->string('lieu');
            $table->text('programme')->nullable();
            $table->boolean('inscription_ouverte')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evenements');
    }
};
