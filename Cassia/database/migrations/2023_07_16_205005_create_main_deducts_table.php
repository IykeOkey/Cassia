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
        Schema::create('main_deducts', function (Blueprint $table) {
            $table->id();
            $table->double('emp_code', 12,2);
            $table->double('tax', 12,2);
            $table->double('car_refu', 12,2);
            $table->double('dev_levy', 12,2);
            $table->double('edu_levy', 12,2);
            $table->double('ashia', 12,2);
            $table->double('nh_fund', 12,2);
            $table->double('u_dues', 12,2);
            $table->double('j_welfare', 12,2);
            $table->double('welfare_id', 12,2);
            $table->double('welf_refund', 12,2);
            $table->double('man', 12,2);
            $table->double('memb', 12,2);
            $table->double('h_loan', 12,2);
            $table->double('hl_bal', 12,2);
            $table->double('v_loan', 12,2);
            $table->double('vl_bal', 12,2);
            $table->double('sal_adv', 12,2);
            $table->double('sal_arrea', 12,2);
            $table->double('sal_bal', 12,2);
            $table->double('insure', 12,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_deducts');
    }
};
