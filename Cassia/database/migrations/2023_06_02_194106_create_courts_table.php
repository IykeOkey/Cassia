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
        Schema::create('courts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('div_id');
        //    $table->foreign('div_id')->references('id')->on('divisions')->onUpdate('cascade')->onDelete('cascade');
            $table->string('ct_code')->unique();
            $table->string('ct_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courts');
    }
};
