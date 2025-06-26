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
        Schema::table('organization_profiles', function (Blueprint $table) {
            $table->date('founded_date')->nullable()->after('logo_path');
            $table->string('instagram_url')->nullable()->after('founded_date');
            $table->string('facebook_url')->nullable()->after('instagram_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('organization_profiles', function (Blueprint $table) {
            $table->dropColumn(['founded_date', 'instagram_url', 'facebook_url']);
        });
    }
};
