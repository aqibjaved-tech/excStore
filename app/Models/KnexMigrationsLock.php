<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 13 May 2019 06:40:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class KnexMigrationsLock
 * 
 * @property int $index
 * @property int $is_locked
 *
 * @package App\Models
 */
class KnexMigrationsLock extends Eloquent
{
	protected $table = 'knex_migrations_lock';
	protected $primaryKey = 'index';
	public $timestamps = false;

	protected $casts = [
		'is_locked' => 'int'
	];

	protected $fillable = [
		'is_locked'
	];
}
