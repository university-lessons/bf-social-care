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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name');
            $table->string('close_relative');
            $table->string('close_relative_degree');
            $table->date('birthdate')->nullable();
            $table->string('cpf')->nullable();
            $table->string('rg')->nullable();
            $table->string('birthplace')->nullable();
            $table->string('address')->nullable();
            $table->string('religion')->nullable();
            $table->string('color')->nullable();
            $table->string('income')->nullable();
            $table->string('chemical_dependency')->nullable();
            $table->string('crime_article')->nullable();
            $table->string('crime_status')->nullable();
            $table->string('family_telephone')->nullable();
            $table->string('family_address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
