<?php
namespace App\Repositories;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{


    public function register()
    {
        $this->app->bind(
            'App\Repositories\NewsRepositoryInterface',
            'App\Repositories\NewsRepository');

        $this->app->bind(
                'App\Repositories\StoreRepositoryInterface',
                'App\Repositories\StoreRepository');
    }
}
