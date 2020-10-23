<?php namespace SergeiKuznetsov\JuniorTestPlugin\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateCategoryProductTable extends Migration
{
    public function up()
    {
        Schema::create('sergeikuznetsov_juniortestplugin_category_product', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->integer('category_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->primary(['category_id', 'product_id'], 'sergeikuznetsov_juniortestplugin_category_product_primary');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sergeikuznetsov_juniortestplugin_category_product');
    }
}
