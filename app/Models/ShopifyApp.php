<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopifyApp extends Model
{
    protected $table = 'shopify_apps';
    protected $fillable = ['app_slug', 'start_rating'];


    /**
     * Get the reviews for the app
     */
    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }
}
