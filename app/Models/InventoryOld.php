<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 13 May 2019 06:40:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class InventoryOld
 * 
 * @property int $id
 * @property int $variant
 * @property int $product
 * @property int $account
 * @property int $location
 * @property int $quantity
 * @property \Carbon\Carbon $createdAt
 * @property \Carbon\Carbon $updatedAt
 *
 * @package App\Models
 */
class InventoryOld extends Eloquent
{
	protected $table = 'inventory_old';
	public $timestamps = false;

	protected $casts = [
		'variant' => 'int',
		'product' => 'int',
		'account' => 'int',
		'location' => 'int',
		'quantity' => 'int'
	];

	protected $dates = [
		'createdAt',
		'updatedAt'
	];

	protected $fillable = [
		'variant',
		'product',
		'account',
		'location',
		'quantity',
		'createdAt',
		'updatedAt'
	];
}
