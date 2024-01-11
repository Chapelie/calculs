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
        Schema::create('fouilles', function (Blueprint $table) {
          $table->string('type');
        //car utilisé pour les petits batiments sans niveau
            $table->integer('quantite_materiaux');
            $table->decimal('largeur', 10, 2);
            $table->decimal('longueur', 10, 2);
            $table->decimal('profondeur', 10, 2);
            $table->decimal('surface', 10, 2);
            $table->decimal('volume', 10, 2);
            $table->decimal('diametre', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fouilles', function (Blueprint $table) {
            $table->dropColumn('type_fouille');
            $table->dropColumn('quantite_materiaux');
            $table->dropColumn('largeur');
            $table->dropColumn('longueur');
            $table->dropColumn('profondeur');
            $table->dropColumn('surface');
            $table->dropColumn('volume');
        });
    }
};
