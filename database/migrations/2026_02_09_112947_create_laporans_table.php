<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->integer('hadir')->default(0);
            $table->integer('izin')->default(0);
            $table->integer('sakit')->default(0);
            $table->integer('alpha')->default(0);
            $table->date('periode_mulai');
            $table->date('periode_selesai');
            $table->timestamps();
        });

        Schema::table('laporans', function (Blueprint $table) {
            $table->foreign('siswa_id')
                  ->references('id')
                  ->on('siswas')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('laporans', function (Blueprint $table) {
            $table->dropForeign(['siswa_id']);
        });

        Schema::dropIfExists('laporans');
    }
};
