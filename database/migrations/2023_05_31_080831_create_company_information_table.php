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
        Schema::create('company_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->string('name');
            $table->string('country')->nullable();
            $table->string('website')->nullable();
            $table->string('tax_registration_number')->nullable();
            $table->date('tax_registration_date')->nullable();
            $table->string('trade_license_number')->nullable();
            $table->date('trade_license_issued_date')->nullable();
            $table->date('trade_license_expiration_date')->nullable();
            $table->string('business_permit_number')->nullable();
            $table->date('business_permit_date')->nullable();
            $table->integer('years_in_business')->nullable();
            $table->unsignedBigInteger('company_type');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_information');
    }
};
