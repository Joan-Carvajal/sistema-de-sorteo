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
        Schema::table('users', function (Blueprint $table) {
            
            
            $table->foreignId('departamento_id')->constrained('departamentos')->onDelete('cascade');

            
            $table->foreignId('ciudad_id')->constrained('ciudades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['departamento_id']);
            $table->dropForeign(['ciudad_id']);
            $table->dropColumn('departamento_id');
            $table->dropColumn('ciudad_id');
        });
    }
};
