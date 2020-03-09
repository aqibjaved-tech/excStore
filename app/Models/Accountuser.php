<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 13 May 2019 06:40:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Accountuser
 * 
 * @property int $id
 * @property int $account
 * @property int $user
 * @property bool $admin
 * @property bool $banned
 * @property int $role
 * @property \Carbon\Carbon $createdAt
 * @property \Carbon\Carbon $updatedAt
 *
 * @package App\Models
 */
class Accountuser extends Eloquent
{
	protected $table = 'accountuser';
	public $timestamps = false;

	protected $casts = [
		'account' => 'int',
		'user' => 'int',
		'admin' => 'bool',
		'banned' => 'bool',
		'role' => 'int'
	];

	protected $dates = [
		'createdAt',
		'updatedAt'
	];

	protected $fillable = [
		'account',
		'user',
		'admin',
		'banned',
		'role',
		'createdAt',
		'updatedAt'
	];
}
