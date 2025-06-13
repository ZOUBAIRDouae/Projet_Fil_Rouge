<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('modules', function (Blueprint $table) {
            $table->foreignId('plan_annuel_id')->nullable()->constrained('plan_annuels')->onDelete('cascade');
        });

        Schema::table('brief_projets', function (Blueprint $table) {
            $table->foreignId('plan_annuel_id')->nullable()->constrained('plan_annuels')->onDelete('cascade');
        });

        Schema::table('competences', function (Blueprint $table) {
            $table->foreignId('plan_annuel_id')->nullable()->constrained('plan_annuels')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('modules', function (Blueprint $table) {
            $table->dropForeign(['plan_annuel_id']);
            $table->dropColumn('plan_annuel_id');
        });

        Schema::table('brief_projets', function (Blueprint $table) {
            $table->dropForeign(['plan_annuel_id']);
            $table->dropColumn('plan_annuel_id');
        });

        Schema::table('competences', function (Blueprint $table) {
            $table->dropForeign(['plan_annuel_id']);
            $table->dropColumn('plan_annuel_id');
        });
    }
};
