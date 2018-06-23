<?php

namespace App\Jobs;

use App\Models\Review;
use App\Models\ShopifyApp;
use App\Repositories\ShopifyAppRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as GuzzleRequest;


class GatherReview implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Create a new job instance.
     * @param ShopifyAppRepository
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $app = 'xero'; // This should be dynamic
        $httpClient = new Client();
        $request = new GuzzleRequest('GET', "https://apps.shopify.com/$app/reviews.json");
        $res = $httpClient->send($request, ['timeout' => 2]);
        $body = json_decode($res->getBody(), TRUE);
        $this->saveData($app, $body );
    }

    /***
     * Persist data into the database
     * @param $app
     * @param $body
     */

    private function saveData($app, $body){
        $shopifyApp = ShopifyApp::where('app_slug', $app)->first();
        if(!$shopifyApp){
            $shopifyApp = new ShopifyApp();
        }

        $shopifyApp->reviews()->delete();

        $shopifyApp->app_slug = 'xero';
        $shopifyApp->previous_star_rating = $shopifyApp->star_rating ?? 0;
        $shopifyApp->star_rating = $body['overall_rating'];

        $shopifyApp->save();
        $shopifyApp->reviews()->saveMany($this->createReviews($body['reviews'], $shopifyApp->id));
    }

    /***
     * Create an array of Reviews
     * @param $reviews
     * @param $id
     * @return array
     */
    private function createReviews($reviews, $id)
    {
        $reviewsLength = count($reviews);
        $i = 0;
        $reviewObjects = [];

        for ($i; $i <= $reviewsLength -1; $i++){
            $reviewObjects[$i] = new Review($reviews[$i]);
        }

        return $reviewObjects;
    }


}
