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
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pel_id_gol')->required();
            $table->string('pel_no', 20)->required();
            $table->string('pel_nama', 50)->required();
            $table->text('pel_alamat')->required();
            $table->string('pel_hp', 20)->required();
            $table->string('pel_ktp', 50)->required();
            $table->string('pel_seri', 50)->required();
            $table->integer('pel_meteran')->required();
            $table->enum('pel_aktif', ['Y', 'N'])->required();
            $table->unsignedBigInteger('pel_id_user')->required();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggans');
    }
};
