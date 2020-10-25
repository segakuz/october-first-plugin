<?php namespace SergeiKuznetsov\JuniorTestPlugin\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateBuysTable extends Migration
{
    public function up()
    {
        Schema::create('sergeikuznetsov_juniortestplugin_buys', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->string('user_phone');
            $table->timestamps();

            $table->foreign('product_id')
            ->references('id')
            ->on('sergeikuznetsov_juniortestplugin_products')
            ->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::dropIfExists('sergeikuznetsov_juniortestplugin_buys');
    }
}
