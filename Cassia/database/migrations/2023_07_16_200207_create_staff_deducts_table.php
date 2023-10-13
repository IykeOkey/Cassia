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
        Schema::create('staff_deducts', function (Blueprint $table) {
            $table->id();
            $table->double('name', 12,2);
            $table->double('tax', 12,2);
            $table->double('car_refu', 12,2);
            $table->double('cf', 12,2);
            $table->double('ded', 12,2);
            $table->double('dev_levy', 12,2);
            $table->double('edu_levy', 12,2);
            $table->double('nh_fund', 12,2);
            $table->double('sd', 12,2);
            $table->double('h_loan', 12,2);
            $table->double('hl_bal', 12,2);
            $table->double('v_loan', 12,2);
            $table->double('vl_bal', 12,2);
            $table->double('sal_adv', 12,2);
            $table->double('sal_arrea', 12,2);
            $table->double('sal_bal', 12,2);
            $table->double('insure', 12,2);
            $table->double('u_due', 12,2);
            $table->double('fide', 12,2);
            $table->double('a', 12,2);
            $table->double('c', 12,2);
            $table->double('other', 12,2);
            $table->double('wel_fare', 12,2);
            $table->double('teac_allow', 12,2);
            $table->double('ndi_olu',  12,2);
            $table->double('tot_ded',  12,2);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_deducts');
    }
};
