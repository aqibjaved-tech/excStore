<?php

namespace App\Providers;
use App\User;
use View;
use Illuminate\Support\ServiceProvider;
use App\Repositories\StoreRepositoryInterface;
use Session;
use Cookie;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->composedata();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            'template.frontend.themes.mazaar.includes.sidebar-cart.sidebar-cart', 'App\Http\ViewComposers\NavigationViewComposer'
        );

        // Or you can use below callback function
        // View::composer('partials.users', function ($view) {
        //     $view->with('users', User::all());
        // });
    }

    public function composedata(){
      View::composer(
          'template.frontend.themes.mazaar.includes.sidebar-cart.sidebar-cart', 'App\Http\Controllers\CartController@getCartdata'
      );
    }
}
