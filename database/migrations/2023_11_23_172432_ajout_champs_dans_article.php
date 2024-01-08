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
        Schema::table('articles', function (Blueprint $table) {
            $table->integer('nombreChambre')->nullable();
            $table->integer('nombreBalcon')->nullable();
            $table->integer('nombreEspaceVert')->nullable();
            $table->string('Dimension')->nullable();
            $table->json('photoChambre')->nullable();
            $table->json('DimensionChambre')->nullable();
            $table->json('LibelleChambre')->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
