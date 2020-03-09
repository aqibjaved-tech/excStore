<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 13 May 2019 06:40:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Orderstatement
 * 
 * @property int $id
 * @property int $orderitem
 * @property int $statement
 * @property \Carbon\Carbon $createdAt
 * @property \Carbon\Carbon $updatedAt
 *
 * @package App\Models
 */
class Orderstatement extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'orderitem' => 'int',
		'statement' => 'int'
	];

	protected $dates = [
		'createdAt',
		'updatedAt'
	];

	protected $fillable = [
		'orderitem',
		'statement',
		'createdAt',
		'updatedAt'
	];
}
