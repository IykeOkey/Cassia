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
        Schema::create('cadres', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('glev_id');
         //   $table->foreign('glev_id')->references('id')->on('gradelevels')->onUpdate('cascade')->onDelete('cascade');
            $table->string('cdr_code')->unique();
            $table->string('cdr_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cadres');
    }
};
