<?php
namespace App\Http\ViewComposers;

use App\User;
use App\Repositories\StoreRepositoryInterface;
use Session;
use Cookie;

class NavigationViewComposer
{
    protected $repository;

    public function __construct(StoreRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function compose($view)
    {
        $total_quantity = 0;
      if(Cookie::get('cartid') != ''){
      $items = $this->repository->getCartitems(Cookie::get('cartid'));

      $items_data = array();
      $items_ids = array();
      $final_data = array();
      // echo '<pre>';
      //  print_r($items); exit;
      
      $productqty = 0;
      for ($i = 0; $i < count($items); $i++)
      {
          $itemsvalue = json_decode($items[$i]->item);
          $total_quantity = $total_quantity + $itemsvalue->product_qty;

            $final_data['id'][$itemsvalue->id] = $items[$i]->id;
            $final_data['name'][$itemsvalue->id] = $itemsvalue->name;
            $final_data['retailPrice'][$itemsvalue->id] = $itemsvalue->retailPrice;
            $final_data['product_qty'][$itemsvalue->id] = $itemsvalue->product_qty;
            $final_data['shipping'][$itemsvalue->id] = $itemsvalue->shipping;
            $final_data['thumbnails'][$itemsvalue->id] = $itemsvalue->thumbnails[0];
      }
    }else{
      $final_data = array();
    }
        Session::put(['cartquantify'=>$total_quantity]);
        return $view->with('final_data', $final_data);
  }
}
