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
        Schema::create('database_siswas', function (Blueprint $table) {
            $table->id();
            $table->string('namalengkap');
            $table->string('unit');
            $table->string('kelas');
            $table->string('nisn');
            $table->string('jeniskelamin');
            $table->string('ttl');
            $table->unsignedBigInteger('userid');
            $table->foreign('userid')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('database_siswas');
    }
};
