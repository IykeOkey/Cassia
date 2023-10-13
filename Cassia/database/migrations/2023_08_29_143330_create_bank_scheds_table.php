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
        Schema::create('bank_scheds', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('tot_pay');
            $table->decimal('bank_code');
            $table->decimal('acct_no');
            $table->decimal('bank_name');
            $table->string('branch');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_scheds');
    }
};
