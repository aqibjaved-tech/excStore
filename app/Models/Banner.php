<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 13 May 2019 06:40:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Banner
 * 
 * @property int $id
 * @property int $account
 * @property string $image
 * @property \Carbon\Carbon $createdAt
 * @property \Carbon\Carbon $updatedAt
 *
 * @package App\Models
 */
class Banner extends Eloquent
{
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
		'image',
		'createdAt',
		'updatedAt'
	];
}
