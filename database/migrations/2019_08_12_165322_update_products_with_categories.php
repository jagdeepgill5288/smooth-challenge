<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProductsWithCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('product_categories', function (Blueprint $table) {
		$table->bigInteger('product_id')->unsigned();
		$table->bigInteger('category_id')->unsigned();
		$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
		$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products', function(Blueprint $table){
    		$table->dropForeign('products_category_id_foreign');
		$table->dropIndex('pr	oducts_category_id_index');
		$table->dropColumn('category_id');
    	});
    }
}
