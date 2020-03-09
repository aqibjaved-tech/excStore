<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 13 May 2019 06:40:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ProductSearchableProperty
 * 
 * @property int $id
 * @property int $product
 * @property int $brand
 * @property string $values
 * @property string $deletedAt
 * @property \Carbon\Carbon $createdAt
 * @property \Carbon\Carbon $updatedAt
 *
 * @package App\Models
 */
class ProductSearchableProperty extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'product' => 'int',
		'brand' => 'int'
	];

	protected $dates = [
		'createdAt',
		'updatedAt'
	];

	protected $fillable = [
		'product',
		'brand',
		'values',
		'deletedAt',
		'createdAt',
		'updatedAt'
	];
}
