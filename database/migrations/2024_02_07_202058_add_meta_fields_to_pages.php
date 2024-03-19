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
        Schema::table('cms_pages', function (Blueprint $table) {
            //Add strings for OGMeta support
        $table->string('application_name')->nullable();
        $table->string('type_card')->nullable();
        $table->string('image')->nullable();
        $table->date('copyright')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cms_pages', function (Blueprint $table) {
            $table->dropColumn('application_name');
            $table->dropColumn('type_card');
            $table->dropColumn('image');
            $table->dropColumn('copyright');
        });
    }
};
