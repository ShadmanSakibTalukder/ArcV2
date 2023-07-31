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
        Schema::create('profit_loss_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profit_loss_id');
            $table->integer('po_id');
            $table->timestamps();

            $table->foreign('profit_loss_id')->references('id')->on('profit_losses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profit_loss_items');
    }
};
