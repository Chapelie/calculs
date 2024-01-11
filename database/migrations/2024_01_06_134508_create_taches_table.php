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
        Schema::create('taches', function (Blueprint $table) {
            $table->id();
            $table->string('nomTache');
            $table->text('descriptionTache')->nullable();
            $table->date('dateDebut')->nullable();
            $table->date('dateFin')->nullable();
            $table->timestamps();
            $table->integer('budget_tache')->nullable();
            $table->integer('evolution')->nullable();
            $table->foreign('projet_id')->references('id')->on('projets')->onDelete('cascade');
            $table->decimal('avancement', 5, 2);
            $table->boolean('status');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taches');
    }
};
