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
        Schema::create('t_project', function (Blueprint $table) {
            $table->id('project_id');
            $table->string('project_name', 250);
            $table->unsignedBigInteger('custid')->nullable();
            $table->string('alamat', 250)->nullable();
            $table->string('lokasi', 50)->nullable();
            $table->text('ket')->nullable();
            $table->smallInteger('status')->default(0);
            $table->string('level', 50)->nullable();
            $table->string('wil', 2)->nullable();
            $table->timestamps();

            $table->foreign('custid')->references('custid')->on('t_customer')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_project');
    }
};
