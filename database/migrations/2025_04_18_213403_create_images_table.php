<?php

use Illuminate\Console\Scheduling\CacheSchedulingMutex;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id('id_image');
            $table->string('title_image')->nullable();
            $table->longText('image_base64');
            $table->string('image_mime')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')
            ->references('id_project')
            ->on('projects')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
