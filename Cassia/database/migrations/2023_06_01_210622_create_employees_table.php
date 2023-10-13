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
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('emp_no');
            $table->string('file_no');
            $table->string('last_name');
            $table->string('middle_name');
            $table->string('first_name');
            $table->string('inc_mo');
            $table->string('fappo');
            $table->string('phone');
            $table->string('email');
            $table->string('birthdate')->nullable();
            $table->enum('marital_status',['Single','Married','Not Married']);
            $table->unsignedBigInteger('media_id')->nullable();
            $table->text('address')->nullable();
            $table->string('country');
            $table->string('state');
            $table->string('lga');
            $table->string('town');
            $table->enum('gender',['Male','Female']);
            $table->string('cadre_code');
            $table->unsignedBigInteger('ct_id')->nullable();
            $table->string('acct_no');
            $table->string('bank_name');
            $table->string('emp_status');
            $table->enum('flag', ['on','off','disp']);
            $table->text('remark')->nullable();
            $table->boolean('is_active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
