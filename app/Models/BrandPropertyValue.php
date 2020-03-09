<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 13 May 2019 06:40:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BrandPropertyValue
 * 
 * @property int $id
 * @property int $brand
 * @property int $property
 * @property string $value
 * @property \Carbon\Carbon $createdAt
 * @property \Carbon\Carbon $updatedAt
 *
 * @package App\Models
 */
class BrandPropertyValue extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'brand' => 'int',
		'property' => 'int'
	];

	protected $dates = [
		'createdAt',
		'updatedAt'
	];

	protected $fillable = [
		'brand',
		'property',
		'value',
		'createdAt',
		'updatedAt'
	];
}
