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
        Schema::create('admin_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained('users')->onDelete('cascade');
            $table->string('action')->index(); // e.g., 'user_created', 'post_deleted', 'login'
            $table->string('model_type')->nullable()->index(); // e.g., 'App\Models\User'
            $table->unsignedBigInteger('model_id')->nullable()->index();
            $table->json('old_values')->nullable(); // Store old values for updates
            $table->json('new_values')->nullable(); // Store new values for updates
            $table->string('ip_address', 45)->nullable()->index();
            $table->text('user_agent')->nullable();
            $table->text('description')->nullable(); // Human readable description
            $table->timestamps();

            $table->index(['admin_id', 'created_at']);
            $table->index(['model_type', 'model_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_logs');
    }
};
