<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Add the new column
            Schema::table('projects', function (Blueprint $table) {
                $table->string('end_date')->nullable()->after('due_date');
            });

            // Copy data from the old column to the new column
            DB::statement('UPDATE projects SET end_date = due_date');

            // Drop the old column
            Schema::table('projects', function (Blueprint $table) {
                $table->dropColumn('due_date');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Add the old column back
            Schema::table('projects', function (Blueprint $table) {
                $table->string('due_date')->nullable()->after('end_date');
            });

            // Copy data from the new column to the old column
            DB::statement('UPDATE projects SET due_date = end_date');

            // Drop the new column
            Schema::table('projects', function (Blueprint $table) {
                $table->dropColumn('end_date');
            });
        });
    }
};
