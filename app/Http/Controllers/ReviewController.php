<?php

namespace App\Http\Controllers;


use App\Repositories\ShopifyAppRepository;


use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /***
     * @var shopify apps repository
     */
    protected $shopifyAppRepository;

    public function __construct(ShopifyAppRepository $shopifyAppRepository)
    {
        $this->shopifyAppRepository = $shopifyAppRepository;
    }

    public function index(){

       $app = $this->shopifyAppRepository->getReviews('xero');

        return response()->json(['app' => $app]);
    }
}
