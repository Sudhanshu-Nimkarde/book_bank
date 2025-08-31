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
        //
        Schema::table('issue_books', function (Blueprint $table) {
            $table->dateTime('due_date')->default(DB::raw('DATE_ADD(NOW(), INTERVAL 7 DAY)'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('issue_books', function (Blueprint $table) {
            $table->dropColumn('due_date');
        });
    }
};
