<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDocNumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_docnum', function (Blueprint $table) {
            $table->bigIncrements('SLNO');
            $table->string('DocType', 50);
            $table->string('Prefix', 10);
            $table->integer('Length');
            $table->bigInteger('CurrNum')->default(0);

            // Unique constraint
            $table->unique('DocType');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_docnum');
    }
}
