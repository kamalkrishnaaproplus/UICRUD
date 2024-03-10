<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSalesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sales_details', function (Blueprint $table) {
            $table->string('DetailID', 50);
            $table->string('TranNo', 50);
            $table->string('CategoryID', 50);
            $table->string('ProductID', 50);
            $table->double('Qty')->default(0);
            $table->double('Price')->default(0);
            $table->double('Taxable')->default(0);
            $table->enum('TaxType', ['Exclude', 'Include']);
            $table->double('TaxPercentage')->default(0);
            $table->double('TaxAmount')->default(0);
            $table->double('Amount')->default(0);
            $table->timestamp('CreatedOn')->useCurrent();
            $table->timestamp('UpdatedOn')->nullable();

            // Primary key definition
            $table->primary('DetailID');

            // Foreign key constraints
            $table->foreign('TranNo')->references('TranNo')->on('tbl_sales')->onDelete('cascade');
            // Add more foreign key constraints if needed
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_sales_details');
    }
}
