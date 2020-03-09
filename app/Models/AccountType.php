<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 13 May 2019 06:40:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AccountType
 * 
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $createdAt
 * @property \Carbon\Carbon $updatedAt
 *
 * @package App\Models
 */
class AccountType extends Eloquent
{
	protected $table = 'account_type';
	public $timestamps = false;

	protected $dates = [
		'createdAt',
		'updatedAt'
	];

	protected $fillable = [
		'name',
		'createdAt',
		'updatedAt'
	];
}
