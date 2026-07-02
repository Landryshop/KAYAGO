<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_number')->unique(); // Le code unique
            $table->string('status');                   // En transit, livré, etc.
            $table->string('origin');                   // Ville de départ
            $table->string('destination');              // Ville d'arrivée
            $table->decimal('weight', 8, 2);            // Poids du colis
            $table->timestamps();                       // Dates de création/mise à jour
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
