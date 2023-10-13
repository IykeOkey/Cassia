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
        Schema::create('sched_sals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('staff_id');
            $table->string('last_name');
            $table->string('middle_name');
            $table->string('first_name');
            $table->string('cdr_code');
            $table->decimal('basic',12,2);
            $table->decimal('rent',12,2);
            $table->decimal('trans',12,2);
            $table->decimal('enter',12,2);
            $table->decimal('util',12,2);
            $table->decimal('meal',12,2);
            $table->decimal('o_time',12,2);
            $table->decimal('dom',12,2);
            $table->decimal('conjus',12,2);
            $table->decimal('other_allow',12,2);
            $table->decimal('tax',12,2);
            $table->decimal('tot_ded',12,2);
            $table->decimal('gross_pay',12,2);
            $table->decimal('net_pay',12,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sched_sals');
    }
};
