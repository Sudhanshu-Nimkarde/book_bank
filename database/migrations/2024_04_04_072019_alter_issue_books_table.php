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
        Schema::table('issue_books', function (Blueprint $table) {
            // Option 1: set default as CURRENT_TIMESTAMP
            // $table->dateTime('due_date')->default(DB::raw('CURRENT_TIMESTAMP'));

            // ✅ Recommended: let Laravel set the due_date (+7 days) in code
            $table->dateTime('due_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('issue_books', function (Blueprint $table) {
            $table->dropColumn('due_date');
        });
    }
};
