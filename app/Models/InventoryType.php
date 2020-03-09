<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 13 May 2019 06:40:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class InventoryType
 * 
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $createdAt
 * @property \Carbon\Carbon $updatedAt
 * 
 * @property \Illuminate\Database\Eloquent\Collection $inventories
 *
 * @package App\Models
 */
class InventoryType extends Eloquent
{
	protected $table = 'inventory_type';
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

	public function inventories()
	{
		return $this->hasMany(\App\Models\Inventory::class, 'inv_type');
	}
}
