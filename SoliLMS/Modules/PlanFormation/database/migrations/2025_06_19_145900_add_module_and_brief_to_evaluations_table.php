<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('evaluations', function (Blueprint $table) {
        $table->unsignedBigInteger('module_id')->after('id');
        $table->unsignedBigInteger('brief_projet_id')->unique()->nullable()->after('module_id');

        $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
        $table->foreign('brief_projet_id')->references('id')->on('brief_projets')->onDelete('set null');
    });
}

public function down(): void
{
    Schema::table('evaluations', function (Blueprint $table) {
        $table->dropForeign(['module_id']);
        $table->dropForeign(['brief_projet_id']);
        $table->dropColumn(['module_id', 'brief_projet_id']);
    });
}

};
