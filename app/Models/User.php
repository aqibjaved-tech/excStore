<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 13 May 2019 06:40:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * 
 * @property int $id
 * @property string $firstName
 * @property string $lastName
 * @property string $title
 * @property string $username
 * @property string $encryptedPassword
 * @property string $auth_token
 * @property string $passwordRecoveryToken
 * @property string $email
 * @property string $phoneNumber
 * @property bool $deleted
 * @property bool $admin
 * @property bool $banned
 * @property bool $agreed
 * @property \Carbon\Carbon $createdAt
 * @property \Carbon\Carbon $updatedAt
 * @property bool $online
 *
 * @package App\Models
 */
class User extends Eloquent
{
	protected $table = 'user';
	public $timestamps = false;

	protected $casts = [
		'deleted' => 'bool',
		'admin' => 'bool',
		'banned' => 'bool',
		'agreed' => 'bool',
		'online' => 'bool'
	];

	protected $dates = [
		'createdAt',
		'updatedAt'
	];

	protected $hidden = [
		'auth_token'
	];

	protected $fillable = [
		'firstName',
		'lastName',
		'title',
		'username',
		'encryptedPassword',
		'auth_token',
		'passwordRecoveryToken',
		'email',
		'phoneNumber',
		'deleted',
		'admin',
		'banned',
		'agreed',
		'createdAt',
		'updatedAt',
		'online'
	];
}
