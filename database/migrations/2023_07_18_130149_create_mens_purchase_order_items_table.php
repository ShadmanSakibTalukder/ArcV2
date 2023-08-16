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
        Schema::create('mens_purchase_order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_order_id');
            $table->integer('item_id');
            $table->integer('qty');
            $table->float('price')->nullable();
            $table->float('total_price')->nullable();
            $table->timestamps();


            $table->foreign('purchase_order_id')->references('id')->on('mens_purchase_orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mens_purchase_order_items');
    }
};
