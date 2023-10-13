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
        Schema::create('leave_allows', function (Blueprint $table) {
            $table->bigIncrements('id');
        //    $table->unsignedBigInteger('sch_id');
        //    $table->foreign('sch_id')->references('id')->on('schedules')->onUpdate('cascade')->onDelete('cascade');
            $table->decimal('basic',8,2);
            $table->decimal('amount',8,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_allows');
    }
};
