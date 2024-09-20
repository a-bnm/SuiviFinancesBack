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
        Schema::create('envies', function (Blueprint $table) {
            $table->id();
            $table->string('designation');
            $table->integer('cout');
            $table->integer('cout_rassemble');
            $table->integer('cout_restant');
            $table->foreignId('user_id')->constrained();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('envies');
    }
};