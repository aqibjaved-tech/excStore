<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 13 May 2019 06:40:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Orderaccount
 * 
 * @property string $externalOrderID
 * @property int $order
 * @property int $account
 * @property int $id
 * @property \Carbon\Carbon $createdAt
 * @property \Carbon\Carbon $updatedAt
 *
 * @package App\Models
 */
class Orderaccount extends Eloquent
{
	protected $table = 'orderaccount';
	public $timestamps = false;

	protected $casts = [
		'order' => 'int',
		'account' => 'int'
	];

	protected $dates = [
		'createdAt',
		'updatedAt'
	];

	protected $fillable = [
		'externalOrderID',
		'order',
		'account',
		'createdAt',
		'updatedAt'
	];
}
