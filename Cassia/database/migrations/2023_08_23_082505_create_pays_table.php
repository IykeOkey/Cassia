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
        Schema::create('pays', function (Blueprint $table) {
            $table->id();
            $table->string('min_name')->nullable();
            $table->string('file_no')->nullable();
            $table->string('hq_sno')->nullable();
            $table->string('emp_no')->nullable();
            $table->string('dept_code')->nullable();
            $table->string('div_code')->nullable();
            $table->string('sec_code')->nullable();
            $table->string('ashia')->nullable();
            $table->string('emp_sur')->nullable();
            $table->string('emp_fir')->nullable();
            $table->string('emp_init')->nullable();
            $table->string('sex')->nullable();
            $table->string('bir_date')->nullable();
            $table->string('fappo')->nullable();
            $table->string('prom_date')->nullable();
            $table->string('post')->nullable();
            $table->string('rank')->nullable();
            $table->string('sal_id')->nullable();
            $table->string('sal_glev')->nullable();
            $table->string('sal_step')->nullable();
            $table->decimal('basic',12,2)->default(0.00);
            $table->decimal('gross_pay',12,2)->default(0.00);
            $table->string('agree_type')->nullable();
            $table->string('duty_disp')->nullable();
            $table->decimal('rent',12,2)->default(0.00);
            $table->decimal('trans',12,2)->default(0.00);
            $table->decimal('enter',12,2)->default(0.00);
            $table->decimal('meal',12,2)->default(0.00);
            $table->decimal('util',12,2)->default(0.00);
            $table->decimal('j_allow',12,2)->default(0.00);
            $table->decimal('tax',12,2)->default(0.00);
            $table->decimal('car_refu',12,2)->default(0.00);
            $table->decimal('cf',12,2)->default(0.00);
            $table->decimal('ded',12,2)->default(0.00);
            $table->decimal('tot_pay',12,2)->default(0.00);
            $table->string('emp_code',12,2)->default(0.00);
            $table->decimal('dev_levy',12,2)->default(0.00);
            $table->decimal('edu_levy',12,2)->default(0.00);
            $table->decimal('nh_fund',12,2)->default(0.00);
            $table->decimal('sd',12,2)->default(0.00);
            $table->decimal('dom',12,2)->default(0.00);
            $table->decimal('gr',12,2)->default(0.00);
            $table->string('out')->nullable();
            $table->decimal('ca',12,2)->default(0.00);
            $table->string('bank_code')->nullable();
            $table->string('acct_no')->nullable();
            $table->string('bank_id')->nullable();
            $table->string('pen_pin')->nullable();
            $table->string('staff_id')->nullable();
            $table->string('bvn')->nullable();
            $table->decimal('h_loan',12,2)->default(0.00);
            $table->decimal('hl_bal',12,2)->default(0.00);
            $table->decimal('v_loan',12,2)->default(0.00);
            $table->decimal('vl_bal',12,2)->default(0.00);
            $table->decimal('sal_adv',12,2)->default(0.00);
            $table->decimal('sal_bal',12,2)->default(0.00);
            $table->decimal('insure',12,2)->default(0.00);
            $table->decimal('u_due',12,2)->default(0.00);
            $table->decimal('fide',12,2)->default(0.00);
            $table->string('cert')->nullable();
            $table->string('lga')->nullable();
            $table->string('sw')->nullable();
            $table->decimal('a',12,2)->default(0.00);
            $table->decimal('c',12,2)->default(0.00);
            $table->decimal('harz',12,2)->default(0.00);
            $table->decimal('rob_allow',12,2)->default(0.00);
            $table->decimal('overtime',12,2)->default(0.00);
            $table->string('inc_mo')->nullable();
            $table->decimal('other',12,2)->default(0.00);
            $table->decimal('wel_fare',12,2)->default(0.00);
            $table->decimal('teac_allow',12,2)->default(0.00);
            $table->decimal('ndi_olu',12,2)->default(0.00);
            $table->string('flag')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pays');
    }
};
