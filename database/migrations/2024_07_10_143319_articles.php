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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('title');
            $table->string('link');
            $table->date('date_created');
            $table->longText('content');
            $table->bigInteger('article_status_id');
            $table->bigInteger('writer_id')->nullable();
            $table->bigInteger('editor_id')->nullable();
            $table->bigInteger('company_id');
            $table->timestamps();
            $table->softDeletes();

            /**
             |---------------------------------------------------------------
             |indexes
             |---------------------------------------------------------------
             */
            $table->fullText('title');
            $table->fullText('link');
            $table->fullText('content');
            $table->index('article_status_id');
            $table->index('writer_id');
            $table->index('editor_id');
            $table->index('company_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
