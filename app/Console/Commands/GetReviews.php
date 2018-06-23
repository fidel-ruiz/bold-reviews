<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GetReviews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reviews:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get reviews for a shopify application';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
    }
}
