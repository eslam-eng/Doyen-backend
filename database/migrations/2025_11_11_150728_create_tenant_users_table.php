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
        Schema::create('tenant_users', function (Blueprint $table) {
            $table->id();
            // Email used for login / identification
            $table->string('email')->index();

            // The tenant identifier (same as in Stancl tenants table)
            $table->string('tenant_id')->index();
            // Optional: additional info
            $table->string('name')->nullable();
            $table->unique(['email', 'tenant_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenant_users');
    }
};
