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
        Schema::create('t_customer', function (Blueprint $table) {
            $table->id('custid');
            $table->string('nama', 50);
            $table->string('alamat', 250)->nullable();
            $table->string('lokasi', 100)->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('npwp', 20)->nullable();
            $table->string('notelp', 20)->nullable();
            $table->string('emailid', 50)->nullable();
            $table->binary('pic')->nullable();
            $table->string('bidang', 100)->nullable();
            $table->dateTime('create_by')->nullable();
            $table->dateTime('update_de')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_customer');
    }
};
