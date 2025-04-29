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
        Schema::table('chercheurs', function (Blueprint $table) {
            $table->string('laboratoire')->after('specialite');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chercheurs', function (Blueprint $table) {
            $table->dropColumn('laboratoire');
        });
    }
};
