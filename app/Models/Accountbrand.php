<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 13 May 2019 06:40:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Accountbrand
 * 
 * @property int $id
 * @property int $account
 * @property int $brand
 * @property \Carbon\Carbon $createdAt
 * @property \Carbon\Carbon $updatedAt
 *
 * @package App\Models
 */
class Accountbrand extends Eloquent
{
	protected $table = 'accountbrand';
	public $timestamps = false;

	protected $casts = [
		'account' => 'int',
		'brand' => 'int'
	];

	protected $dates = [
		'createdAt',
		'updatedAt'
	];

	protected $fillable = [
		'account',
		'brand',
		'createdAt',
		'updatedAt'
	];
}
