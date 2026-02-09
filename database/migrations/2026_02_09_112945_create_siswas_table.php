<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id(); // BIGINT UNSIGNED
            $table->string('nis')->unique();
            $table->string('nama');
            $table->unsignedBigInteger('kelas_id');
            $table->timestamps();
        });

        Schema::table('siswas', function (Blueprint $table) {
            $table->foreign('kelas_id')
                  ->references('id')
                  ->on('kelas')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->dropForeign(['kelas_id']);
        });

        Schema::dropIfExists('siswas');
    }
};
