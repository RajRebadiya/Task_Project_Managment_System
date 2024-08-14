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
        //
        Schema::table('projects', function (Blueprint $table) {
            // Remove the 'priority' column
            $table->dropColumn('priority');

            // Add the new 'client' column
            $table->string('client')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Re-add the 'priority' column
            $table->string('priority')->nullable();

            // Drop the 'client' column
            $table->dropColumn('client');
        });
    }
};
