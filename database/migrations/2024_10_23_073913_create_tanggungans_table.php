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
        Schema::create('tanggungans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('registration_id');  // Foreign key
            $table->string('namaLengkap');
            $table->string('sekolah');
            $table->string('kelas');
            $table->decimal('uangSekolah', 10, 2)->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('registration_id')->references('id')->on('registrations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the <migrations class=""></migrations>
     */
    public function down(): void
    {
        Schema::dropIfExists('tanggungans');
    }
};
