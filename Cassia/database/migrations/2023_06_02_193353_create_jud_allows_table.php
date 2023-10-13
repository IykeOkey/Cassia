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
        Schema::create('jud_allows', function (Blueprint $table) {
            $table->bigIncrements('id');
        //    $table->unsignedBigInteger('grad_id');
        //    $table->foreign('grad_id')->references('id')->on('salgrades')->onUpdate('cascade')->onDelete('cascade');
            $table->string('factor');
            $table->decimal('multipler',5,2);
            $table->decimal('j_allow',8,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jud_allows');
    }
};
