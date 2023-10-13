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
        Schema::create('grade_levels', function (Blueprint $table) {
            $table->bigIncrements('id');
        //    $table->unsignedBigInteger('rk_id');
        //    $table->foreign('rk_id')->references('id')->on('ranks')->onUpdate('cascade')->onDelete('cascade');
        //    $table->unsignedBigInteger('stp_id');
        //    $table->foreign('stp_id')->references('id')->on('glsteps')->onUpdate('cascade')->onDelete('cascade');
            $table->string('glev_code')->unique();
            $table->string('glev_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grade_levels');
    }
};
