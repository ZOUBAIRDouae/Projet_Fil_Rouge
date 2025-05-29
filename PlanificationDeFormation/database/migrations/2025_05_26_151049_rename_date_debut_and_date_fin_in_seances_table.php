<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('seances', function (Blueprint $table) {
            $table->renameColumn('date_debut', 'heure_debut');
            $table->renameColumn('date_fin', 'heure_fin');
        });
    }

    public function down()
    {
        Schema::table('seances', function (Blueprint $table) {
            $table->renameColumn('heure_debut', 'date_debut');
            $table->renameColumn('heure_fin', 'date_fin');
        });
    }
};
