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
        Schema::create('charts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sal_id');
            $table->decimal('basicpa',12,2);
            $table->decimal('basicpm',12,2);
            $table->decimal('rent',12,2);
            $table->decimal('trans',12,2);
            $table->decimal('meal',12,2);
            $table->decimal('util',12,2);
            $table->decimal('enter',12,2);
            $table->decimal('domestic',12,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('charts');
    }
};
