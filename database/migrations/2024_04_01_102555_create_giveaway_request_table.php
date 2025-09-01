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
        Schema::create('giveaway_request', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // FIX: use datetime instead of date (CURRENT_DATE not supported)
            $table->dateTime('date')->default(DB::raw('CURRENT_TIMESTAMP'));

            // FIX: make sure this references "donations" table
            $table->foreignId('donation_id')->constrained('donation')->onDelete('cascade');

            $table->string('status')->default('Applied');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('giveaway_request');
    }
};
