<?php
/**
 * Created by PhpStorm.
 * User: fidel
 * Date: 23/06/18
 * Time: 10:56
 */

namespace App\Repositories;


interface ShopifyAppRepositoryInterface
{
    public function getReviews($app_name);

}