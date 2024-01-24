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
        Schema::create('cms_pages', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->timestamps();
            $table->softDeletes();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('keywords')->nullable();
            $table->foreignUlid('author')->nullable()->references('id')->on('users')->onDelete('set null');
            $table->string('slug')->nullable();
            $table->integer('order')->default(0);
            $table->tinyInteger('published')->default(0);
            $table->timestamp('published_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms_pages');
    }
};
