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
        Schema::create('staffers', function (Blueprint $table) {
            $table->id();
            $table->string('min_name');
            $table->string('staff_id');
            $table->string('file_no');
            $table->string('hq_sno');
            $table->string('emp_no');
            $table->string('inc_mo');
            $table->string('dept_code');
            $table->string('div_code');
            $table->string('sec_code');
            $table->string('sp_duty');
            $table->string('title');
            $table->string('emp_sur');
            $table->string('emp_fir');
            $table->string('emp_init');
            $table->string('gender');
            $table->string('bir_date');
            $table->string('fappo');
            $table->string('rank');
            $table->string('sal_desc');
            $table->string('sal_glev');
            $table->string('sal_step');
            $table->string('email');
            $table->string('phone');
            $table->string('lga');
            $table->string('town');
            $table->string('nok_id');
            $table->string('agree_type');
            $table->string('duty_disp');
            $table->string('bank_code');
            $table->string('acct_no');
            $table->string('bank_id');
            $table->string('bverify');
            $table->date('rtd_date');
            $table->string('flag');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staffers');
    }
};
