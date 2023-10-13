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
        Schema::create('dues', function (Blueprint $table) {
            $table->bigIncrements('id');
        //    $table->unsignedBigInteger('etype_id');
        //    $table->foreign('etype_id')->references('id')->on('emptypes')->onUpdate('cascade')->onDelete('cascade');
            $table->string('rate_param');
            $table->decimal('rate',5,2);
            $table->string('due_name');
            $table->decimal('amount',8,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dues');
    }
};
