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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_no');
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
            $table->float('total_purchase_price')->nullable();
            $table->float('total_declared_price')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
