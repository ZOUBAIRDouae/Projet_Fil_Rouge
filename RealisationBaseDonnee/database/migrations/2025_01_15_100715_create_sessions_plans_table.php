<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{


    public function up(): void
    {
        Schema::create('sessions_plans', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->integer('num_session'); 
            $table->integer('semaine_session'); 
            $table->text('objectif_session');
            $table->text('sujet');
            $table->text('mini_projet');
            $table->text('evaluation');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->unsignedBigInteger('user_id'); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('plan_id'); 
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
            $table->unsignedBigInteger('formation_id'); 
            $table->foreign('formation_id')->references('id')->on('formations')->onDelete('cascade');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('sessions_plans');
    }
};
