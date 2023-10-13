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
        Schema::create('schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->decimal('basic',8,2);
            $table->decimal('rent',8,2);
            $table->decimal('trans',8,2);
            $table->decimal('enter',8,2);
            $table->decimal('util',8,2);
            $table->decimal('meal',8,2);
            $table->decimal('overtime',8,2);
            $table->decimal('dom',8,2);
            $table->decimal('c',8,2);
            $table->decimal('ca',8,2);
            $table->decimal('sd',8,2);
            $table->decimal('harz',8,2);
            $table->decimal('j_allow',8,2);
            $table->decimal('rob_allow',8,2);
            $table->decimal('gross_pay',8,2);
            $table->decimal('ded',8,2);
            $table->decimal('tot_pay',8,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
