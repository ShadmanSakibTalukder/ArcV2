<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCagecToCatelogPartLists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('catelog_part_lists', function (Blueprint $table) {
            $table->string('cagec')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('catelog_part_lists', function (Blueprint $table) {
            $table->dropColumn('cagec');
        });
    }
}
