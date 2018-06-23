<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->string('author');
            $table->longText('body');
            $table->string('shop_domain');
            $table->string('shop_name');
            $table->integer('star_rating');

            //Relation between apps and reviews
            $table->unsignedInteger('shopify_apps_id');

            $table
                ->foreign('shopify_apps_id')
                ->references('id')
                ->onDelete('cascade')
                ->on('shopify_apps');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
