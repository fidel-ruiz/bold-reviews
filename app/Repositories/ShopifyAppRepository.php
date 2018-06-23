<?php
/**
 * Created by PhpStorm.
 * User: fidel
 * Date: 23/06/18
 * Time: 10:58
 */

namespace App\Repositories;

use App\Models\ShopifyApp;

class ShopifyAppRepository implements ShopifyAppRepositoryInterface
{
    private $shopifyApp;
    public function __construct(ShopifyApp $shopifyApp)
    {
        $this->shopifyApp = $shopifyApp;
    }

    public function getReviews($app_name)
    {   
        $shopifyApp = ShopifyApp::where('app_slug', $app_name)->with('reviews')->get();
        return $shopifyApp;
    }


}