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
        Schema::create('t_project_pic', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->string('name', 50);
            $table->string('phone', 20)->nullable();
            $table->string('phone2', 29)->nullable();
            $table->string('email', 50)->nullable();
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
        Schema::dropIfExists('t_project_pic');
    }
};
