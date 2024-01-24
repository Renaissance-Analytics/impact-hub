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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->boolean('tester')->default(false);
            $table->string('type')->nullable();
            $table->string('company_name')->nullable();
            $table->string('role')->nullable();
            $table->string('display_name')->nullable()->after('name');
            $table->string('referral_code')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('tester');
            $table->dropColumn('type');
            //drop company name and role
            $table->dropColumn('company_name');
            $table->dropColumn('role');
            $table->dropColumn('display_name');
            $table->dropColumn('referral_code');
        });
    }
};
