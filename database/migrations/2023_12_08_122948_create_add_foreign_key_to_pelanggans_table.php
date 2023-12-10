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
        Schema::table('pelanggans', function (Blueprint $table) {
            $table->foreign('pel_id_gol')->references('id')->on('golongans')->onDelete('restrict');
            $table->foreign('pel_id_user')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migratio0ns.
     */
    public function down(): void
    {
        Schema::table('pelanggans', function (Blueprint $table) {
            $table->dropForeign(['pel_id_gol']);
            $table->dropForeign(['pel_id_user']);
        });
    }
};
