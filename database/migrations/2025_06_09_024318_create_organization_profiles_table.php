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
        Schema::create('organization_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->text('address');
            $table->string('city');
            $table->string('province');
            $table->string('postal_code')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('website_url')->nullable();
            $table->string('logo_path')->nullable();
            $table->enum('status', ['active', 'suspended'])->default('active');
            $table->foreignId('verified_by')->nullable()->constrained('users');
            $table->timestamp('verified_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organization_profiles');
    }
};
