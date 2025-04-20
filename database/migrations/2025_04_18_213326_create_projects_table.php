<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id('id_project');
            $table->string('type_project');
            $table->string('title_project');
            $table->date('development_start_date')->nullable();
            $table->date('development_end_date')->nullable();
            $table->longText('image_base64')->nullable();
            $table->string('image_mime')->nullable();
            $table->string('url_github')->nullable();
            $table->string('url_site')->nullable();
            $table->string('url_download')->nullable();
            $table->longText('description')->nullable();
            $table->timestamp('last_edition')->nullable();

            $table->timestamps();

            $table->unsignedBigInteger("project_category_id")->nullable();
            $table->foreign('project_category_id')
                ->references('id_project_category')
                ->on('project_categories')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on("users")->onDelete("set null")->onUpdate("cascade");
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
