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
        Schema::create('taxes', function (Blueprint $table) {
            $table->bigIncrements('id');
        //    $table->unsignedBigInteger('glev_id');
        //    $table->foreign('glev_id')->references('id')->on('gradelevels')->onUpdate('cascade')->onDelete('cascade');
            $table->string('tx_code')->unique();
            $table->decimal('rate_per_hour',6,2);
            $table->double('tx_amount',8,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taxes');
    }
};
