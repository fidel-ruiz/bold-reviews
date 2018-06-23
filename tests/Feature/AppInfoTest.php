<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AppInfoTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test()
    {
        $response = $this->withHeaders([
                'Accept'=> 'application/json'
            ])
            ->get('/api/reviews');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'app' => [
                    '*' => [
                        'id',
                        'app_slug',
                        'star_rating',
                        'previous_star_rating',
                        'reviews' => [
                            '*' => [
                                'author',
                                'body',
                                'shop_domain',
                                'shop_name',
                                'star_rating'
                            ]],

                    ]

                ]
            ]);
    }
}
