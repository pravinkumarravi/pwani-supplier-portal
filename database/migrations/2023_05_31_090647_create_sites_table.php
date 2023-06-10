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
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->string('payment_mode')->nullable();
            $table->string('credit_limit')->nullable();
            $table->string('business_nature')->nullable();
            $table->string('credit_value_requested')->nullable();
            $table->string('credit_value_approved')->nullable();
            $table->string('credit_type')->nullable();
            $table->string('payment_term')->nullable();
            $table->string('credit_limit')->nullable();
            $table->string('credit_currency')->nullable();
            $table->string('site_status_id')->nullable();
            $table->boolean('is_synchronized')->default(false);
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sites');
    }
};
