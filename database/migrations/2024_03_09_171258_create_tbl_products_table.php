<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_products', function (Blueprint $table) {
            $table->string('ProductID', 50);
            $table->string('ProductName', 100);
            $table->string('CategoryID', 50);
            $table->double('MRP')->default(0);
            $table->double('PRate')->default(0);
            $table->double('SRate')->default(0);
            $table->double('TaxPercentage')->default(0);
            $table->enum('TaxType', ['Exclude', 'Include']);
            $table->enum('taxable', ['Yes', 'No']); // Added taxable column after TaxType
            $table->text('Image');
            $table->enum('ActiveStatus', ['Active', 'Inactive']);
            $table->tinyInteger('DFlag')->default(0)->length(1);
            $table->timestamp('CreatedOn')->useCurrent();
            $table->timestamp('UpdatedOn')->nullable();
            $table->timestamp('DeletedOn')->nullable();

            // Primary key definition
            $table->primary('ProductID');

            // Foreign key constraint for CategoryID
            $table->foreign('CategoryID')->references('CategoryID')->on('tbl_category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_products');
    }
}
