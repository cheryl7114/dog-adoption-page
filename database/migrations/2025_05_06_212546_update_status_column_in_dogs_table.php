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
        // Add 'pending' to the status enum options
        DB::statement("ALTER TABLE dogs MODIFY status ENUM('available', 'adopted', 'pending') DEFAULT 'available'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert back to original definition
        DB::statement("ALTER TABLE dogs MODIFY status ENUM('available', 'adopted') DEFAULT 'available'");
    }
};