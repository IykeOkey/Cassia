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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->string('staff_id');
            $table->string('emp_sur');
            $table->string('emp_fir');
            $table->string('emp_init');
            $table->string('sal_desc');
            $table->double('basic', 12,2);
            $table->double('hous', 12,2);
            $table->double('trans', 12,2);
            $table->double('enter', 12,2);
            $table->double('meal', 12,2);
            $table->double('util', 12,2);
            $table->double('j_allow', 12,2);
            $table->double('dom', 12,2);
            $table->double('over', 12,2);
            $table->double('ca', 12,2);
            $table->double('hazard', 12,2);
            $table->double('rob_allow', 12,2);
            $table->double('overtime', 12,2);
            $table->double('spec_duty', 12,2);
            $table->double('others', 12,2);
            $table->double('tax', 12,2);
            $table->double('ded', 12,2);
            $table->double('gross_pay', 12,2);
            $table->double('net_pay', 12,2);
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};
