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
        Schema::create('commende', function (Blueprint $table) {
            $table->id();
            $table->string('id_commende');
            $table->integer('id_client');
            $table->json('produits');
            $table->string('adresse');
            $table->string('ville');
            $table->string('prix_commende_total');
            $table->string('validite_payement');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commende');
    }
};
