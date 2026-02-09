<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->unsignedBigInteger('mata_pelajaran_id');
            $table->integer('nilai');
            $table->timestamps();
        });

        Schema::table('nilais', function (Blueprint $table) {
            $table->foreign('siswa_id')
                  ->references('id')
                  ->on('siswas')
                  ->onDelete('cascade');

            $table->foreign('mata_pelajaran_id')
                  ->references('id')
                  ->on('mata_pelajarans')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('nilais', function (Blueprint $table) {
            $table->dropForeign(['siswa_id']);
            $table->dropForeign(['mata_pelajaran_id']);
        });

        Schema::dropIfExists('nilais');
    }
};
