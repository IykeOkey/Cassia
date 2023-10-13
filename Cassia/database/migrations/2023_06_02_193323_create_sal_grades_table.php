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
        Schema::create('sal_grades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('grad_code');
            $table->string('grad_glev');
            $table->string('grad_step');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sal_grades');
    }
};
