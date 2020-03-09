<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 13 May 2019 06:40:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Variant
 * 
 * @property int $id
 * @property int $account
 * @property int $product
 * @property string $source_id
 * @property string $source_type
 * @property string $item_number
 * @property string $upc
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
class Variant extends Eloquent
{
	protected $table = 'variant';
	public $timestamps = false;

	protected $casts = [
		'account' => 'int',
		'product' => 'int'
	];

	protected $dates = [
		'createdAt',
		'updatedAt'
	];

	protected $fillable = [
		'account',
		'product',
		'source_id',
		'source_type',
		'item_number',
		'upc',
		'properties',
		'deletedAt',
		'createdAt',
		'updatedAt'
	];

	public function inventories()
	{
		return $this->hasMany(\App\Models\Inventory::class, 'variant');
	}

	public function product_retailers()
	{
		return $this->hasMany(\App\Models\ProductRetailer::class, 'variant');
	}
}
