<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventorySupplierRelationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories_suppliers', function (Blueprint $table) {
            $table->integer('inv_id')->unsigned();
            $table->integer('supplier_id')->unsigned();
            $table->string('unit')->nullable();
            $table->double('price_per_unit',10,2)->nullabe();

            $table->primary(array('inv_id', 'supplier_id'));

            $table->foreign('inv_id')->references('inv_id')->on('inventories');
            $table->foreign('supplier_id')->references('supplier_id')->on('suppliers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inventories_suppliers');
    }
}
