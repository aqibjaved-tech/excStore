<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 13 May 2019 06:40:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Product
 * 
 * @property int $id
 * @property int $account
 * @property string $source_id
 * @property string $source_type
 * @property string $item_number
 * @property string $upc
 * @property string $name
 * @property string $retail_price
 * @property string $properties
 * @property string $deletedAt
 * @property \Carbon\Carbon $createdAt
 * @property \Carbon\Carbon $updatedAt
 * 
 * @property \Illuminate\Database\Eloquent\Collection $inventories
 * @property \Illuminate\Database\Eloquent\Collection $product_retailers
 *
 * @package App\Models
 */
class Product extends Eloquent
{
	protected $table = 'product';
	public $timestamps = false;

	protected $casts = [
		'account' => 'int'
	];

	protected $dates = [
		'createdAt',
		'updatedAt'
	];

	protected $fillable = [
		'account',
		'source_id',
		'source_type',
		'item_number',
		'upc',
		'name',
		'retail_price',
		'properties',
		'deletedAt',
		'createdAt',
		'updatedAt'
	];

	public function inventories()
	{
		return $this->hasMany(\App\Models\Inventory::class, 'product');
	}

	public function product_retailers()
	{
		return $this->hasMany(\App\Models\ProductRetailer::class, 'product');
	}
}
