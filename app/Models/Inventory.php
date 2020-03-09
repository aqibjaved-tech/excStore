<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 13 May 2019 06:40:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Inventory
 * 
 * @property int $id
 * @property int $account
 * @property string $upc
 * @property int $quantity
 * @property \Carbon\Carbon $createdAt
 * @property \Carbon\Carbon $updatedAt
 * @property int $brand
 * @property int $variant
 * @property int $location
 * @property int $retailer
 * @property int $inv_type
 * @property int $retail_price
 * @property int $flat_shipping
 * @property int $product
 * 
 * @property \App\Models\InventoryType $inventory_type
 *
 * @package App\Models
 */
class Inventory extends Eloquent
{
	protected $table = 'inventory';
	public $timestamps = false;

	protected $casts = [
		'account' => 'int',
		'quantity' => 'int',
		'brand' => 'int',
		'variant' => 'int',
		'location' => 'int',
		'retailer' => 'int',
		'inv_type' => 'int',
		'retail_price' => 'int',
		'flat_shipping' => 'int',
		'product' => 'int'
	];

	protected $dates = [
		'createdAt',
		'updatedAt'
	];

	protected $fillable = [
		'account',
		'upc',
		'quantity',
		'createdAt',
		'updatedAt',
		'brand',
		'variant',
		'location',
		'retailer',
		'inv_type',
		'retail_price',
		'flat_shipping',
		'product'
	];

	public function account()
	{
		return $this->belongsTo(\App\Models\Account::class, 'retailer');
	}

	public function inventory_type()
	{
		return $this->belongsTo(\App\Models\InventoryType::class, 'inv_type');
	}

	public function location()
	{
		return $this->belongsTo(\App\Models\Location::class, 'location');
	}

	public function product()
	{
		return $this->belongsTo(\App\Models\Product::class, 'product');
	}

	public function variant()
	{
		return $this->belongsTo(\App\Models\Variant::class, 'variant');
	}
}
