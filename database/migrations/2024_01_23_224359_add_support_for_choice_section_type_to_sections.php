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
        Schema::table('cms_sections', function (Blueprint $table) {
            //
            $table->foreignUlid('page_one_id')->nullable()->constrained('cms_pages')->onDelete('set null');
            $table->string('page_one_blurb')->nullable();
            $table->string('page_one_image')->nullable();
            $table->string('page_one_color')->nullable();
            $table->string('page_one_cta_text')->nullable();
            $table->string('page_one_cta_icon')->nullable();

            $table->foreignUlid('page_two_id')->nullable()->constrained('cms_pages')->onDelete('set null');
            $table->string('page_two_blurb')->nullable();
            $table->string('page_two_image')->nullable();
            $table->string('page_two_color')->nullable();
            $table->string('page_two_cta_icon')->nullable();
            $table->string('page_two_cta_text')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cms_sections', function (Blueprint $table) {
            //
            $table->dropColumn('page_one_id');
            $table->dropColumn('page_one_blurb');
            $table->dropColumn('page_one_image');
            $table->dropColumn('page_one_color');
            $table->dropColumn('page_one_cta_text');
            $table->dropColumn('page_one_cta_icon');

            $table->dropColumn('page_two_id');
            $table->dropColumn('page_two_blurb');
            $table->dropColumn('page_two_image');
            $table->dropColumn('page_two_color');
            $table->dropColumn('page_two_cta_icon');
            $table->dropColumn('page_two_cta_text');
        });
    }
};
