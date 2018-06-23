<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    protected $fillable = ['author', 'body', 'shop_domain', 'shop_name', 'star_rating'];
    public $timestamps = false;

    /**
     * Get the post that owns the comment.
     */
    public function shopify_app()
    {
        return $this->belongsTo('App\Models\ShopifyApp');
    }
}
