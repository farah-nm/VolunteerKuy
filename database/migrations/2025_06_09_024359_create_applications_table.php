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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('participant_profile_id')->constrained('participant_profiles')->onDelete('cascade');
            $table->foreignId('volunteer_activity_id')->constrained('volunteer_activities')->onDelete('cascade');
            $table->timestamp('application_date')->useCurrent();
            $table->enum('status', ['approved'])->default('approved');
            $table->timestamp('processed_by_organization_at')->nullable();
            $table->text('rejection_reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
