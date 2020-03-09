<?php
namespace App\Repositories;

use App\Store;
use View;
use Cookie;
class StoreRepository implements StoreRepositoryInterface
{

    public function getStoreinfoByDomainName($data)
    {
        $api_baseurl =  config('constants.ApiUrl');
        
        $arrContextOptions = array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );
        try{
            $content = file_get_contents("$api_baseurl/accountInfo?domainName=$data", false, stream_context_create($arrContextOptions));
        $result  = json_decode($content);
        return $result;
        } catch(Exception $e) {
            print_r(array('helloError::',$result));
        }
        
        return 11;
    }

    public function launchStoreDatabyID($storeid)
    {
        $api_baseurl =  config('constants.ApiUrl')."/launchData";
        $payload = '{"account_id":'.$storeid.',"variables":{"logoWidth":280,"logoHeight":280}}';
        $header = array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($payload));
        $result = $this->postCurl($api_baseurl,$header, $payload);
        return $result;
    }

    public function getProductsbyfilters($pagesize, $brandid, $storeid, $search_data){
            $pagesize = 1;
        $api_baseurl =  config('constants.ApiUrl')."/products?page_size=12&page=".$pagesize."&all_records=false&filterflag=true";

        if($search_data['filter_type'] == 'search'){
            $category = (!is_null($search_data['category']) ? '[{"property":"color","value":"'.$search_data['category'].'"}]' : '[]');
            $color = (!is_null($search_data['color']) ? '[{"property":"color","value":"'.$search_data['color'].'"}]'  : '[]');
            $size = (!is_null($search_data['size']) ? '[{"property":"color","value":"'.$search_data['size'].'"}]' : '[]');
            $brand = (!is_null($search_data['brand']) ? '[{"property":"brand","value":"'.$search_data['brand'].'"}]' : '[]');
            $gender = (!is_null($search_data['gender']) ? '[{"property":"gender","value":"'.$search_data['gender'].'"}]' : '[]');

            $payload = '{"current_account":'.$storeid.',"brand":null,"accountBrands":[],"search":null,"filters":{"genders":'.$gender.',"colors":'.$color.',"sizes":'.$size.',"brands":'.$brand.',"categories":'.$category.'},"variables":{"thumbnailWidth":500,"thumbnailHeight":500,"largeThumbnailWidth":1025,"largeThumbnailHeight":1400}}';
        }
        elseif ($search_data['filter_type'] == 'header_search'){
            $payload = '{"current_account":'.$storeid.',"brand":'.$brandid.',"accountBrands":[],"search":"'.$search_data['search_product'].'","filters":{"genders":[],"colors":[],"sizes":[],"brands":[],"categories":[]},"variables":{"thumbnailWidth":500,"thumbnailHeight":500,"largeThumbnailWidth":1025,"largeThumbnailHeight":1400}}';
        }
        else{
            if($search_data['filter_type'] == 'product'){
                $payload = '{"current_account":'.$storeid.',"brand":'.$brandid.',"accountBrands":[],"search":"'.$search_data['filter'].'","filters":{"genders":[],"colors":[],"sizes":[],"brands":[],"categories":[]},"variables":{"thumbnailWidth":500,"thumbnailHeight":500,"largeThumbnailWidth":1025,"largeThumbnailHeight":1400}}';
            }elseif($search_data['filter_type'] == 'color'){
                $payload = '{"current_account":'.$storeid.',"brand":'.$brandid.',"accountBrands":[],"search":null,"filters":{"genders":[],"colors":[{"property":"color","value":"'.$search_data['filter'].'"}],"sizes":[],"brands":[],"categories":[]},"variables":{"thumbnailWidth":500,"thumbnailHeight":500,"largeThumbnailWidth":1025,"largeThumbnailHeight":1400}}';
            }elseif($search_data['filter_type'] == 'size'){
                $payload = '{"current_account":'.$storeid.',"brand":'.$brandid.',"accountBrands":[],"search":null,"filters":{"genders":[],"colors":[],"sizes":{"property":"size","value":"'.$search_data['filter'].'"},"brands":[],"categories":[]},"variables":{"thumbnailWidth":500,"thumbnailHeight":500,"largeThumbnailWidth":1025,"largeThumbnailHeight":1400}}';
            }elseif($search_data['filter_type'] == 'brand'){
                $payload = '{"current_account":'.$storeid.',"brand":'.$brandid.',"accountBrands":[],"search":null,"filters":{"genders":[],"colors":[],"sizes":[],"brands":[],"categories":[]},"variables":{"thumbnailWidth":500,"thumbnailHeight":500,"largeThumbnailWidth":1025,"largeThumbnailHeight":1400}}';
            }elseif($search_data['filter_type'] == 'categories'){
                $payload = '{"current_account":'.$storeid.',"brand":'.$brandid.',"accountBrands":[],"search":null,"filters":{"genders":[],"colors":[],"sizes":[],"brands":[],"categories":[]},"variables":{"thumbnailWidth":500,"thumbnailHeight":500,"largeThumbnailWidth":1025,"largeThumbnailHeight":1400}}';
            }
        }
        $header = array(
            'Content-Type: application/json',
        );

        $result = $this->postCurl($api_baseurl,$header, $payload);

        return $result;

    }

    public function getProductsbyBrandIdandStoreId($brandid,$storeid,$pagesize,$category)
    {
            $pagesize = 1;
        
        $api_baseurl =  config('constants.ApiUrl')."/products?page_size=12&page=".$pagesize."&all_records=false&filterflag=true";
        if($brandid != '') {
                if($category == '' ){
                $payload = '{"current_account":'.$storeid.',"brand":'.$brandid.',"accountBrands":[],"search":null,"filters":{"genders":[],"colors":[],"sizes":[],"brands":[],"categories":[]},"variables":{"thumbnailWidth":500,"thumbnailHeight":500,"largeThumbnailWidth":1025,"largeThumbnailHeight":1400}}';
            }else {
                $payload = '{"current_account":'.$storeid.',"brand":null,"categories":["'.$category.'"],"search":null,"filters":{"genders":[],"colors":[],"sizes":[],"brands":[],"categories":[]},"variables":{"thumbnailWidth":500,"thumbnailHeight":500,"largeThumbnailWidth":1025,"largeThumbnailHeight":1400}}';
            }
        } else {
            if($category == '' ){
                $payload = '{"current_account":'.$storeid.',"brand":null,"accountBrands":[],"search":null,"filters":{"genders":[],"colors":[],"sizes":[],"brands":[],"categories":[]},"variables":{"thumbnailWidth":500,"thumbnailHeight":500,"largeThumbnailWidth":1025,"largeThumbnailHeight":1400}}';
            }else {
                $payload = '{"current_account":'.$storeid.',"brand":null,"categories":["'.$category.'"],"search":null,"filters":{"genders":[],"colors":[],"sizes":[],"brands":[],"categories":[]},"variables":{"thumbnailWidth":500,"thumbnailHeight":500,"largeThumbnailWidth":1025,"largeThumbnailHeight":1400}}';
            }
        }
        

        $header = array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($payload)
        );

        $result = $this->postCurl($api_baseurl,$header, $payload);
        return $result;
    }

    public function getProductsDetailsbyIdandStoreId($productid)
    {
        $api_baseurl =  config('constants.ApiUrl')."/product";
        $payload = '{"productID":"'.$productid.'","variables":{"imageWidth":720,"imageHeight":720,"thumbnailWidth":240,"thumbnailHeight":240,"largeThumbnailWidth":500,"largeThumbnailHeight":500}}';
        $header = array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($payload)
        );
        $result = $this->postCurl($api_baseurl, $header,$payload);
        return $result;
    }
    public function getCartid()
    {
        $api_baseurl =  config('constants.ApiUrl')."/cart";
        ///If no cart id then///
        $payload = '{"cart":{}}';
        ///If no cart id then///
        $header = array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($payload)
        );
        $result = $this->postCurl($api_baseurl,$header,$payload);
        return $result;
    }

    public function postCartdata($cart_id,$cart_item)
    {
        
        $api_baseurl =  config('constants.ApiUrl')."/cartItem";
        $payload = '{"cartItem":{"item": '.$cart_item.',  "isActive":true,"cartId":'.$cart_id.'}}';
        $header = array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($payload)
        );

        $result = $this->postCurl($api_baseurl, $header, $payload);
        return $result;
    }

    public function deleteCartitem($cart_id,$item_id)
    {
        $api_baseurl =  config('constants.ApiUrl')."/updateCartItem?isActive=0&cartItemId=".$item_id;
        $header = array(
            'Content-Type: application/json',
        );
        $result = $this->getCurl($api_baseurl,$header);
        return $result;
    }

    public function updateCart($item_id,$qty)
    {
        $api_baseurl =  config('constants.ApiUrl')."/updateCartItem?cartItemId=".$item_id."&qantity=".$qty;
        $header = array(
            'Content-Type: application/json',
        );

        $result = $this->getCurl($api_baseurl,$header);
    }

    public function getCartitems($cart_id)
    {
        $api_baseurl =  config('constants.ApiUrl');
        $arrContextOptions = array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );
        $content = file_get_contents("$api_baseurl/cartItems?cartId=".$cart_id, false, stream_context_create($arrContextOptions));
        
        $result  = json_decode($content);
        return  $result;
    }

    public function getCurl($url, $header){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => $header,
        ));
        $response = curl_exec($curl);
        if (curl_error($curl)) {
            return curl_error($curl);
        }
        curl_close($curl);
        return $response;
    }

    public function postCurl($url,$header, $fields){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $result = curl_exec($ch);
        if (curl_error($ch)) {
            $error_msg = curl_error($ch);
            return $error_msg;
        }
        curl_close($ch);
        return $result;
    }
}
