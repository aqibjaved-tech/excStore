<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 13 May 2019 06:40:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Orderlocation
 * 
 * @property int $order
 * @property int $location
 * @property int $id
 * @property \Carbon\Carbon $createdAt
 * @property \Carbon\Carbon $updatedAt
 *
 * @package App\Models
 */
class Orderlocation extends Eloquent
{
	protected $table = 'orderlocation';
	public $timestamps = false;

	protected $casts = [
		'order' => 'int',
		'location' => 'int'
	];

	protected $dates = [
		'createdAt',
		'updatedAt'
	];

	protected $fillable = [
		'order',
		'location',
		'createdAt',
		'updatedAt'
	];
}
