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
        Schema::table('adoption_requests', function (Blueprint $table) {
            $table->string('contact_email')->nullable()->after('dog_id');
            $table->string('contact_phone')->nullable()->after('contact_email');
        });
    }

    public function down(): void
    {
        Schema::table('adoption_requests', function (Blueprint $table) {
            $table->dropColumn(['contact_email', 'contact_phone']);
        });
    }
};
