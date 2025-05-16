<?php

namespace App\Providers;

use App\Repositories\AuthRepository;
use Illuminate\Support\ServiceProvider;
use App\RepositoryInterface\AuthInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}