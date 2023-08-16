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
        Schema::create('mens_purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->string('po_no');
            $table->string('company');
            $table->mediumText('company_address');
            $table->string('vendor_name')->nullable();
            $table->mediumText('vendor_address')->nullable();
            $table->mediumText('shipping_address')->nullable();
            $table->string('tender_no')->nullable();
            $table->string('wo_no')->nullable();
            $table->date('po_date');
            $table->float('total_declared_price_no')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mens_purchase_orders');
    }
};
