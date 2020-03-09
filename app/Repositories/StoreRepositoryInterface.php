<?php
namespace App\Repositories;

interface StoreRepositoryInterface
{
    public function getStoreinfoByDomainName($data);
    public function launchStoreDatabyID($storeid);
    public function getProductsbyBrandIdandStoreId($brandid,$storeid,$pagesize,$category);
    public function getProductsbyfilters($pagesize, $brandid, $storeid, $search_data);

    public function getProductsDetailsbyIdandStoreId($productid);
    public function getCartid();
    public function postCartdata($cart_id,$cart_item);
    public function getCartitems($cart_id);
    public function deleteCartitem($cart_id,$item_id);


}
