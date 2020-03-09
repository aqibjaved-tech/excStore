<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::post('/create_site_folder','StoreViewController@sitepages');

Route::group(['domain' => '{domain}'],  function () {
         Route::get('/', ['uses'=>'StoreViewController@index', 'subdomain' => 'AQ']);
         //Route::get('/', 'NewsController@store');
         Route::get('/brands', ['uses'=>'StoreViewController@brands','subdomain' => 'AQ']);

         Route::get('/product-filter', ['uses'=>'StoreViewController@product_filteration', 'subdomain' => 'AQ']);
         Route::get('/brands/{brandname}', ['as' => 'brand_name', 'uses' => 'StoreViewController@productsListing']);
         Route::get('/{brandname}/{productname}/{pid}', ['as' => 'product_name', 'uses' => 'StoreViewController@productsDetails']);
         Route::get('/product/{pid}', 'StoreViewController@filter_product_details');
         //Route::post('/{brandname}/{productname}', 'CartController@add');
        //Route::post('/addtocart', 'CartController@add');
         Route::get('/cart', 'CartController@details');
         Route::get('/getcartid', 'CartController@getcartid');
         Route::post('/{brandname}/{productname}/{pid}', ['as' => 'product_name', 'uses' => 'CartController@add']);

         Route::post('/cart', 'CartController@updateCart');
         Route::post('/removeproduct', 'CartController@removeProduct');
         Route::get('/removeproduct/{itemid}', 'CartController@deleteProduct');



         //Route::post('/{category}/{productname}/{pid}', ['as' => 'product_name', 'uses' => 'CartController@add']);
         Route::post('/checkoutdata', 'CartController@checkout');
         Route::get('/checkout', 'CartController@checkout');
         Route::post('/checkout', 'CartController@stripePost')->name('stripe.post');

         //Route::get('stripe', 'StripePaymentController@stripe');
         //Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');

         // Route::post('/updatecart', 'CartController@updateCart');
         // Route::post('/removeproduct', 'CartController@removeProduct');
         //Route::delete('/removeproduct/{id}','CartController@delete')->name('cart.delete');
         Route::get('/{category}', 'StoreViewController@productsListing')->where('category', '(.*)');
         Route::get('/{category}/{productname}/{pid}', 'StoreViewController@productsDetails');


         Route::get('/admin/dashboard/login', function () {
            return view('template/admin/pages/dashboard/login');
         });
         Route::get('/admin/dashboard/', 'CommonController@index');
         Route::get('/admin/dashboard/settings/', 'CommonController@getSettings');
         Route::get('/admin/dashboard/faq/', 'CommonController@ourFaq');
         Route::get('/admin/dashboard/video/', 'CommonController@watchVideo');
         Route::get('/admin/dashboard/getting-started/', 'CommonController@gettingStarted');
});
