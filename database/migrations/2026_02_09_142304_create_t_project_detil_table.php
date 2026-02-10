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
        Schema::create('t_project_detil', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 6);
            $table->integer('jumlah')->default(0);
            $table->unsignedBigInteger('project_id');
            $table->text('ket')->nullable();
            $table->timestamps();


            $table->foreign('project_id')->references('project_id')->on('t_project')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_project_detil');
    }
};
