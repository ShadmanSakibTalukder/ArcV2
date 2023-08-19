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
        Schema::create('catelog_part_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('item_no')->nullable();
            $table->string('nsn')->nullable();
            $table->string('part_no')->nullable();
            $table->string('description')->nullable();
            $table->string('page_no')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catelog_part_lists');
    }
};
