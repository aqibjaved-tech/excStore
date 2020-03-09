<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class GetDataProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://staging.exchangecollective.com/api/v2/getPageBySiteId/7');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $data = curl_exec($ch);
        $js = json_decode($data);
        curl_close($ch);
// var_dump($js);die;
        view()->share(compact('js'));
    }
}
