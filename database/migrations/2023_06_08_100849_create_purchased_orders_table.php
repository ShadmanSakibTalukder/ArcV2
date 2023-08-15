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
        Schema::create('purchased_orders', function (Blueprint $table) {
            $table->id();
            $table->string('po_no');
            $table->tinyInteger('status')->default('0')->comment('1=done,0=working');
            $table->string('company');
            $table->mediumText('company_address');
            $table->string('buyer_name')->nullable();
            $table->mediumText('buyer_address')->nullable();
            $table->string('vendor_name')->nullable();
            $table->mediumText('vendor_address')->nullable();
            $table->mediumText('shipping_address')->nullable();
            $table->string('tender_no')->nullable();
            $table->string('wo_no')->nullable();
            $table->date('po_date');
            $table->integer('total_purchase_price_no')->nullable();
            $table->integer('total_declared_price_no')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchased_orders');
    }
};
