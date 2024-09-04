<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produit', function (Blueprint $table) {
            $table->id('code');
            $table->string('nom');
            $table->integer('prix');
            $table->string('reduction');
            $table->integer('new_prix')->nullable();
            $table->string('classe');
            $table->string('details');
            $table->integer('quantité');
            $table->string('photoprofil');
            $table->string('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produit');
    }
};
