<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnShopifyAppId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // I've used postgres and the renameColumn doesn't work,
        // not enough time to find out why
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropColumn('shopify_apps_id');
            $table->addColumn('integer', 'shopify_app_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // I've used postgres and the renameColumn doesn't work,
        // not enough time to find out why
        Schema::table('reviews', function (Blueprint $table) {

            $table->dropColumn('shopify_app_id');
            $table->addColumn('integer', 'shopify_apps_id');

        });
    }
}
