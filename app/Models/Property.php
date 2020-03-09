<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 13 May 2019 06:40:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Property
 * 
 * @property int $id
 * @property string $slug
 * @property string $name
 * @property bool $searchable
 * @property bool $hidden
 * @property \Carbon\Carbon $createdAt
 * @property \Carbon\Carbon $updatedAt
 *
 * @package App\Models
 */
class Property extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'searchable' => 'bool',
		'hidden' => 'bool'
	];

	protected $dates = [
		'createdAt',
		'updatedAt'
	];

	protected $fillable = [
		'slug',
		'name',
		'searchable',
		'hidden',
		'createdAt',
		'updatedAt'
	];
}
