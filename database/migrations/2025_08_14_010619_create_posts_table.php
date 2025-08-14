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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            // Reference to owner who created the post
            $table->foreignId('owner_id')->constrained('users')->onDelete('cascade')->index();

            // Post details
            $table->string('title', 150); // Limit title to 150 characters
            $table->text('description')->nullable(); // Text doesn’t need length
            $table->unsignedInteger('required_labours'); // No change needed

            // Job specifics
            $table->string('location', 255); // Max 255 chars for location
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            // Work type and pricing
            $table->enum('work_type', ['daily', 'hourly'])->default('daily')->index();
            $table->decimal('wage_per_day', 10, 2)->nullable();  // 10 digits total, 2 after decimal
            $table->decimal('wage_per_hour', 10, 2)->nullable(); // 10 digits total, 2 after decimal

            // Status of the post
            $table->enum('status', ['open', 'closed', 'in_progress'])->default('open')->index();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
