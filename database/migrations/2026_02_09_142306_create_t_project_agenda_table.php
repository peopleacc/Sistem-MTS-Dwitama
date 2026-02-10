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
        Schema::create('t_project_agenda', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->date('tgl')->nullable();
            $table->time('jam')->nullable();
            $table->string('lokasi', 50)->nullable();
            $table->text('ket')->nullable();
            $table->text('respon')->nullable();
            $table->dateTime('tgl_respond')->nullable();
            $table->smallInteger('status')->default(0);
            $table->timestamps();

            $table->foreign('project_id')->references('project_id')->on('t_project')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_project_agenda');
    }
};
