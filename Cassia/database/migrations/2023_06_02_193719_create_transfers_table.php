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
        Schema::create('transfers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('div_id');
        //    $table->foreign('div_id')->references('id')->on('divisions')->onUpdate('cascade')->onDelete('cascade');
        //    $table->unsignedBigInteger('ct_id');
        //    $table->foreign('ct_id')->references('id')->on('courts')->onUpdate('cascade')->onDelete('cascade');
        //    $table->unsignedBigInteger('staff_id');
        //    $table->foreign('staff_id')->references('id')->on('staff')->onUpdate('cascade')->onDelete('cascade');
            $table->string('trf_code')->unique();
            $table->string('trf_name');
            $table->string('wefdate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfers');
    }
};
