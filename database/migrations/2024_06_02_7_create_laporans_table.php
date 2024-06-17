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
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->integer('kode');
            $table->date('tanggal');
            $table->unsignedBigInteger('tanaman_id');
            $table->unsignedBigInteger('tanam_id');
            $table->foreign('tanaman_id')->references('id')->on('tanaman')->onDelete('cascade');
            $table->foreign('tanam_id')->references('id')->on('tanam')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};
