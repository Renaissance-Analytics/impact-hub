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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('name')->required();
            $table->string('layout')->required();
            $table->integer('order')->default(0);
            $table->foreignUlid('cms_page_id')->constrained()->onDelete('cascade');
            $table->string('image')->nullable();
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->string('cta_text')->nullable();
            $table->foreignId('cta_link')->nullable()->references('id')->on('sections')->onDelete('set null');
            $table->string('bgcolor')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
