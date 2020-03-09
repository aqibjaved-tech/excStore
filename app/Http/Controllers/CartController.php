<?php
/**
 * Created by PhpStorm.
 * User: darryl
 * Date: 4/30/2017
 * Time: 10:58 AM
 */

namespace App\Http\Controllers;



use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\StoreRepositoryInterface;
use Darryldecode\Cart\CartCondition;
use Illuminate\Http\Request;
use App\Http\Controllers\CommonController;
use Redirect;
use View;
use Session;
use Cookie;
use Stripe;


class CartController extends Controller
{
  protected $repository;
  

  public function __construct(StoreRepositoryInterface $repository)
  {
      $this->repository = $repository;
      
  }

    public function index()
    {
        $userId = 1; // get this from session or wherever it came from

        if(request()->ajax())
        {
            $items = [];

            \Cart::session($userId)->getContent()->each(function($item) use (&$items)
            {
                $items[] = $item;
            });

            return response(array(
                'success' => true,
                'data' => $items,
                'message' => 'cart get items success'
            ),200,[]);
        }
        else
        {
            return view('cart');
        }
    }
    public function checkDomainName($dn) {
      if($dn == "excStore") {
          return false;
      } else {
          return $dn;
      }
  }
  public function getDomainName($domain) {
      if($domain[0] == "www") {
          return $domain[1];
      } else {
          return $domain[0];
      }
  }

    public function getcartid(Request $request)
    {

      $subdomain = $request->instance()->query('domain');
      $commonController = new CommonController;
      $fullDomain = explode(".",parse_url($request->root())['host']);
        $domain = $this->getDomainName($fullDomain);
        $result = $this->checkDomainName($domain);
        if(!$result) {
            return Redirect::to('http://exchangecollective.com/');
        }
      $storedata = $this->repository->getStoreinfoByDomainName($domain);
       if(isset($storedata->errors[0]->code)) {
             return View::make('welcome');
         }
      $storeid =  $storedata->accountInfo->account->id;
      $launchstoredata = $this->repository->launchStoreDatabyID($storeid);
      $launchstoredata = json_decode($launchstoredata, true);

      @$data = $launchstoredata;

      $cart_id = $this->repository->getCartid();
      $cart_id = json_decode($cart_id, true);
      return $cart_id['id'];

    }
    public function add(Request $request)
    {
      $commonController = new CommonController;
      $subdomain = $request->instance()->query('domain');
      $fullDomain = explode(".",parse_url($request->root())['host']);
        $domain = $this->getDomainName($fullDomain);
        $result = $this->checkDomainName($domain);
       
      if(!$result) {
          return Redirect::to('http://exchangecollective.com/');
      }
      $storedata = $this->repository->getStoreinfoByDomainName($domain);
      
       if(isset($storedata->errors[0]->code)) {
             return View::make('welcome');
         }
      $storeid =  $storedata->accountInfo->account->id;
      $launchstoredata = $this->repository->launchStoreDatabyID($storeid);
      $launchstoredata = json_decode($launchstoredata, true);

      @$data = $launchstoredata;

        $cartid = $request->post('cartid');
        $cart_item = $request->post('item');
        Session::put(['cartid'=>$cartid]);
        Cookie::queue('cartid', $cartid, 907200);
        $postCartdata = $this->repository->postCartdata($cartid,$cart_item);
        @$bannerimg = '';
        $request->session()->flash('success', 'Item added successfully!');
        
      }

    public function updateCart(Request $request)  {
      for($i=0; $i < count($request->input('pid')); $i++){
        if($request->input('new_quantity')[$i] == 0){
          $this->repository->deleteCartitem('', $request->input('rowid')[$i]);
        }else{
        $this->repository->updateCart($request->input('rowid')[$i], $request->input('new_quantity')[$i]);
      }
      }

        return redirect()->back()->with('msg','Cart updated successfully');
    }

    public function addCondition()
    {
        $userId = 1; // get this from session or wherever it came from

        /** @var \Illuminate\Validation\Validator $v */
        $v = validator(request()->all(),[
            'name' => 'required|string',
            'type' => 'required|string',
            'target' => 'required|string',
            'value' => 'required|string',
        ]);

        if($v->fails())
        {
            return response(array(
                'success' => false,
                'data' => [],
                'message' => $v->errors()->first()
            ),400,[]);
        }

        $name = request('name');
        $type = request('type');
        $target = request('target');
        $value = request('value');

        $cartCondition = new CartCondition([
            'name' => $name,
            'type' => $type,
            'target' => $target, // this condition will be applied to cart's subtotal when getSubTotal() is called.
            'value' => $value,
            'attributes' => array()
        ]);

        \Cart::session($userId)->condition($cartCondition);

        return response(array(
            'success' => true,
            'data' => $cartCondition,
            'message' => "condition added."
        ),201,[]);
    }

    public function clearCartConditions()
    {
        $userId = 1; // get this from session or wherever it came from

        \Cart::session($userId)->clearCartConditions();

        return response(array(
            'success' => true,
            'data' => [],
            'message' => "cart conditions cleared."
        ),200,[]);
    }

    public function removeProduct(Request $request)
    {
        $this->repository->updateCart($request->input('rowid')[$i], $request->input('new_quantity')[$i]);
        return redirect()->back()->with('msg','Cart updated successfully');
    }

    public function deleteProduct($itemid)
    {
        $this->repository->deleteCartitem('', $itemid);
        return redirect()->back()->with('msg','Product deleted successfully');
    }

    public function details(Request $request)
    {
      $commonController = new CommonController;
      $subdomain = $request->instance()->query('domain');
       $fullDomain = explode(".",parse_url($request->root())['host']);
      $domain = $this->getDomainName($fullDomain);
      $result = $this->checkDomainName($domain);
      $storedata = $this->repository->getStoreinfoByDomainName($domain);
       if(isset($storedata->errors[0]->code)) {
             return View::make('welcome');
         }
      $storeid =  $storedata->accountInfo->account->id;
      $launchstoredata = $this->repository->launchStoreDatabyID($storeid);
      $launchstoredata = json_decode($launchstoredata, true);

      @$data = $launchstoredata;
      $cartid = Cookie::get('cartid');
      if($cartid != ''){
      $items = $this->repository->getCartitems($cartid);

      $items_data = array();
      $items_ids = array();
      $final_data = array();
      $productqty = 0;
      for ($i = 0; $i < count($items); $i++)
      {

            $itemsvalue = json_decode($items[$i]->item);

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

      return View::make('template/frontend/themes/mazaar/pages/cart',compact('data','final_data'));
    }
    public function checkout(Request $request)
    {
      $commonController = new CommonController;
      $subdomain = $request->instance()->query('domain');
      $fullDomain = explode(".",parse_url($request->root())['host']);
        $domain = $this->getDomainName($fullDomain);
        $result = $this->checkDomainName($domain);
      $storedata = $this->repository->getStoreinfoByDomainName($domain);
       if(isset($storedata->errors[0]->code)) {
             return View::make('welcome');
         }
      $storeid =  $storedata->accountInfo->account->id;
      $launchstoredata = $this->repository->launchStoreDatabyID($storeid);
      $launchstoredata = json_decode($launchstoredata, true);
      @$data = $launchstoredata;
      if(Cookie::get('cartid') != ''){
      $items = $this->repository->getCartitems(Cookie::get('cartid'));
      $items_data = array();
      $items_ids = array();
      $final_data = array();
      $productqty = 0;
      for ($i = 0; $i < count($items); $i++)
      {
            $itemsvalue = json_decode($items[$i]->item);
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
      return View::make('template/frontend/themes/mazaar/pages/checkout')->with('data',$data)->with('final_data',$final_data);
    }

    public function stripePost(Request $request)
    {
      $validatedData = $request->validate([
        'shipping_first_name' => 'required',
        'shipping_last_name' => 'required',
        'shipping_phone' => 'required',
        'shipping_address_1' => 'required',
        'shipping_city' => 'required',
        'shipping_state' => 'required',
        'shipping_postcode' => 'required',
        'billing_first_name' => 'required',
        'billing_last_name' => 'required',
        'billing_phone' => 'required',
        'billing_address_1' => 'required',
        'terms' => 'required',
        'billing_city' => 'required',
        'billing_state' => 'required',
        'billing_postcode' => 'required',
    ]);


          $data['account_id'] = 813;
            $data['location_id'] = 6166;
          $data['assoc_id'] = 6167;
          $data['emailAddress'] = $request->post('billing_email');

          $data['shippingAddress'] = array(
          'firstName' => $request->input('shipping_first_name'),
          'lastName' => $request->input('shipping_last_name'),
          'phoneNumber' => $request->input('shipping_phone'),
          'address1' => $request->input('shipping_address_1'),
          'address2' => $request->input('shipping_address_2'),
          'city' => $request->input('shipping_city'),
          'state' => $request->input('shipping_state'),
          'zip' => $request->input('shipping_postcode')
         );

          $data['billingAddress'] = array(
          'firstName' => $request->input('billing_first_name'),
          'lastName' => $request->input('billing_last_name'),
          'phoneNumber' => $request->input('billing_phone'),
          'address1' => $request->input('billing_address_1'),
          'address2' => $request->input('billing_address_2'),
          'city' => $request->input('billing_city'),
          'state' => $request->input('billing_state'),
          'zip' => $request->input('billing_postcode')
        );
        $cartid = 0;
        $cartid = Cookie::get('cartid');
        $items = $this->repository->getCartitems($cartid);
        $productqty = 0;
        $total = 0;

        for ($i = 0; $i < count($items); $i++)
        {
          $itemsvalue = json_decode($items[$i]->item);
          $total = $total + ($itemsvalue->product_qty * $itemsvalue->retailPrice);
            $data['items'][] = array('brand'=>array('name'=>$itemsvalue->brand->name,'taxRate'=>$itemsvalue->brand->taxRate,'brandId'=>1142),
              'productID'=>$itemsvalue->id,'variantID'=>'null', 'name'=>$itemsvalue->name, 'itemNumber'=>$itemsvalue->itemNumber
              ,'upc'=>$itemsvalue->upc,'size'=>$itemsvalue->shipping,'color'=>$itemsvalue->shipping,
              'quantityAvailable'=>$itemsvalue->quantityAvailable,'quantity'=>$itemsvalue->product_qty,'retailPrice'=>$itemsvalue->retailPrice,
              'subtotal'=>$total,'shipping'=>$itemsvalue->shipping,'estTax'=>$itemsvalue->shipping,'total'=>$total+$itemsvalue->shipping
            );
        }

        $data['paymentInformation'] = array(
          'issuer' => $request->input('brand'),
          'last4' => $request->input('last4'),
          'expMonth' => $request->input('exp_month'),
          'expYear' => $request->input('exp_year'),
          'token' => $request->input('stripeToken')
        );

        $data['shipToStore'] = false;
        $data['subtotal'] = 180;
        $data['estTax'] = 14.85;
        $data['shipping'] = 0;
        $data['total'] = 194.85;

        $api_baseurl =  config('constants.ApiUrl');
        $data_string = json_encode($data);

        $ch = curl_init("$api_baseurl/order/");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string))
        );
          $result = curl_exec($ch);
        if (curl_error($ch)) {
                $error_msg = curl_error($ch);
        }

        curl_close($ch);

        Session::put('cartquantify',0);

        return redirect()->back()->with('msg','Order Placed Successfuly');
    }
}
