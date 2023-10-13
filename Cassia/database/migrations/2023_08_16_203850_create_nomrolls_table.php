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
        Schema::create('nomrolls', function (Blueprint $table) {
            $table->id();
            $table->string('min_name');
            $table->string('file_no');
            $table->string('hq_sno');
            $table->string('emp_no');
            $table->string('dept_code');
            $table->string('div_code');
            $table->string('sec_code');
            $table->string('ashia');
            $table->string('emp_sur');
            $table->string('emp_fir');
            $table->string('emp_init');
            $table->string('sex');
            $table->date('bir_date');
            $table->date('fappo');
            $table->date('prom_date');
            $table->string('post');
            $table->string('rank');
            $table->string('sal_id');
            $table->string('sal_glev');
            $table->string('sal_step');
            $table->string('basic');
            $table->string('bank_code');
            $table->string('acct_no');
            $table->string('bank_id');
            $table->string('pen_pin');
            $table->string('staff_id');
            $table->string('bvn');
            $table->string('h_loan');
            $table->string('hl_bal');
            $table->string('v_loan');
            $table->string('vl_bal');
            $table->string('sal_adv');
            $table->string('sal_bal');
            $table->string('u_due');
            $table->string('fide');
            $table->string('insure');
            $table->string('cert');
            $table->string('lga');
            $table->string('agree_type');
            $table->string('duty_disp');
            $table->integer('inc_mo');
            $table->string('harz');
            $table->string('flag');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nomrolls');
    }
};
