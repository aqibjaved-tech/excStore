<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 13 May 2019 06:40:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ProductRetailer
 * 
 * @property int $id
 * @property int $product
 * @property int $variant
 * @property int $retailer
 * @property string $properties
 * @property string $price_rules
 * @property int $retail_price
 * @property int $flat_shipping
 * @property \Carbon\Carbon $createdAt
 * @property \Carbon\Carbon $updatedAt
 * 
 * @property \App\Models\Account $account
 *
 * @package App\Models
 */
class ProductRetailer extends Eloquent
{
	protected $table = 'product_retailer';
	public $timestamps = false;

	protected $casts = [
		'product' => 'int',
		'variant' => 'int',
		'retailer' => 'int',
		'retail_price' => 'int',
		'flat_shipping' => 'int'
	];

	protected $dates = [
		'createdAt',
		'updatedAt'
	];

	protected $fillable = [
		'product',
		'variant',
		'retailer',
		'properties',
		'price_rules',
		'retail_price',
		'flat_shipping',
		'createdAt',
		'updatedAt'
	];

	public function product()
	{
		return $this->belongsTo(\App\Models\Product::class, 'product');
	}

	public function account()
	{
		return $this->belongsTo(\App\Models\Account::class, 'retailer');
	}

	public function variant()
	{
		return $this->belongsTo(\App\Models\Variant::class, 'variant');
	}
}
