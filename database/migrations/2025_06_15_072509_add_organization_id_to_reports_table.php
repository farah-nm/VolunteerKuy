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
        Schema::table('reports', function (Blueprint $table) {
            $table->foreignId('organization_profile_id')->nullable()->constrained('organization_profiles')->onDelete('set null')->after('participant_profile_id');
            $table->dropForeign(['volunteer_activity_id']); // Hapus foreign key yang mungkin sudah ada
            $table->dropColumn('volunteer_activity_id'); // Hapus kolom volunteer_activity_id jika tidak lagi diperlukan untuk laporan organisasi
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->dropForeign(['organization_profile_id']);
            $table->dropColumn('organization_profile_id');
            $table->foreignId('volunteer_activity_id')->constrained('volunteer_activities')->onDelete('cascade')->after('participant_profile_id'); // Kembalikan kolom jika diperlukan
        });
    }
};
