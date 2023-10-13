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
        Schema::create('ranks', function (Blueprint $table) {
            $table->bigIncrements('id');
            //    $table->unsignedBigInteger('glev_id');
            //    $table->foreign('glev_id')->references('id')->on('gradelevels')->onUpdate('cascade')->onDelete('cascade');
            //    $table->unsignedBigInteger('etype_id');
            //    $table->foreign('etype_id')->references('id')->on('emptypes')->onUpdate('cascade')->onDelete('cascade');
            //    $table->unsignedBigInteger('stp_id');
            //    $table->foreign('stp_id')->references('id')->on('glsteps')->onUpdate('cascade')->onDelete('cascade');
                $table->string('rk_code')->unique();
                $table->string('rk_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ranks');
    }
};
