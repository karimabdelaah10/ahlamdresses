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
            $table->string('whats_app_number')->nullable();
            $table->string('whats_app_message')->nullable();
            $table->string('tiktok_url')->nullable();
            $table->string('insta_url')->nullable();
        });

        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('whats_app_number');
            $table->dropColumn('whats_app_message');
            $table->dropColumn('tiktok_url');
            $table->dropColumn('insta_url');
        });
    }
};
