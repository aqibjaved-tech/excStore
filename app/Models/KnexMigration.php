<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 13 May 2019 06:40:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class KnexMigration
 * 
 * @property int $id
 * @property string $name
 * @property int $batch
 * @property \Carbon\Carbon $migration_time
 *
 * @package App\Models
 */
class KnexMigration extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'batch' => 'int'
	];

	protected $dates = [
		'migration_time'
	];

	protected $fillable = [
		'name',
		'batch',
		'migration_time'
	];
}
