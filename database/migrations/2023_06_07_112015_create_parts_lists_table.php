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
        Schema::create('parts_lists', function (Blueprint $table) {
            $table->id();
            $table->string('requested_part_no');
            $table->string('requested_nomenclature');
            $table->string('cat_part_no')->nullable();
            $table->string('cat_nomenclature')->nullable();
            $table->string('nsn')->nullable();
            $table->string('classification')->nullable();
            $table->string('lead_time')->nullable();
            $table->string('weight')->nullable();
            $table->string('image')->nullable();
            $table->float('surplus_price')->nullable();
            $table->float('fs_price')->nullable();
            $table->float('navister_price')->nullable();
            $table->float('declared_price')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parts_lists');
    }
};
