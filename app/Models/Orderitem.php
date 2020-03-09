<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 13 May 2019 06:40:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Orderitem
 * 
 * @property int $id
 * @property int $order
 * @property int $shipment
 * @property string $upc
 * @property string $state
 * @property string $item_name
 * @property string $size
 * @property float $retail_price
 * @property float $wholesale
 * @property int $quantity
 * @property float $subtotal
 * @property float $sales_tax
 * @property float $shipping
 * @property float $total
 * @property float $toEXC
 * @property float $toBrand
 * @property float $toRetailer
 * @property int $brand
 * @property int $customer
 * @property int $retailer
 * @property int $retailerExtID
 * @property int $salesAssociate
 * @property int $salesAssociateExtID
 * @property string $salesAssociateName
 * @property int $product
 * @property int $productVariant
 * @property \Carbon\Carbon $createdAt
 * @property \Carbon\Carbon $updatedAt
 *
 * @package App\Models
 */
class Orderitem extends Eloquent
{
	protected $table = 'orderitem';
	public $timestamps = false;

	protected $casts = [
		'order' => 'int',
		'shipment' => 'int',
		'retail_price' => 'float',
		'wholesale' => 'float',
		'quantity' => 'int',
		'subtotal' => 'float',
		'sales_tax' => 'float',
		'shipping' => 'float',
		'total' => 'float',
		'toEXC' => 'float',
		'toBrand' => 'float',
		'toRetailer' => 'float',
		'brand' => 'int',
		'customer' => 'int',
		'retailer' => 'int',
		'retailerExtID' => 'int',
		'salesAssociate' => 'int',
		'salesAssociateExtID' => 'int',
		'product' => 'int',
		'productVariant' => 'int'
	];

	protected $dates = [
		'createdAt',
		'updatedAt'
	];

	protected $fillable = [
		'order',
		'shipment',
		'upc',
		'state',
		'item_name',
		'size',
		'retail_price',
		'wholesale',
		'quantity',
		'subtotal',
		'sales_tax',
		'shipping',
		'total',
		'toEXC',
		'toBrand',
		'toRetailer',
		'brand',
		'customer',
		'retailer',
		'retailerExtID',
		'salesAssociate',
		'salesAssociateExtID',
		'salesAssociateName',
		'product',
		'productVariant',
		'createdAt',
		'updatedAt'
	];
}
