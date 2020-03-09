<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Cookie;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        $cartid = Cookie::get('wishlist');
        $id = explode('-',$cartid);
        $wishlist = array();
        $count_w = 0;
        
        if(!is_null($cartid)){
            
                    foreach ($id as $pid){
            $count_w = $count_w+1;
            $api_baseurl =  config('constants.ApiUrl')."/product";
            $payload = '{"productID":"'.$pid.'","variables":{"imageWidth":720,"imageHeight":720,"thumbnailWidth":240,"thumbnailHeight":240,"largeThumbnailWidth":500,"largeThumbnailHeight":500}}';
            $header = array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($payload)
            );

            $ch = curl_init($api_baseurl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLINFO_HEADER_OUT, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            $result = curl_exec($ch);
            curl_close($ch);

            $fi = json_decode($result);
            $wishlist[] = (array) $fi;
        }
        }else{
            $wishlist = false;
        }

        view()->share(compact('wishlist','count_w'));
    }
}