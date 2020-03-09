<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 13 May 2019 06:40:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Location
 * 
 * @property int $id
 * @property string $name
 * @property int $location_type_id
 * @property string $firstName
 * @property string $lastName
 * @property string $phoneNumber
 * @property string $address
 * @property string $address2
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property string $phone
 * @property int $account
 * @property \Carbon\Carbon $createdAt
 * @property \Carbon\Carbon $updatedAt
 * @property int $externalID
 * 
 * @property \Illuminate\Database\Eloquent\Collection $inventories
 *
 * @package App\Models
 */
class Location extends Eloquent
{
	protected $table = 'location';
	public $timestamps = false;

	protected $casts = [
		'location_type_id' => 'int',
		'account' => 'int',
		'externalID' => 'int'
	];

	protected $dates = [
		'createdAt',
		'updatedAt'
	];

	protected $fillable = [
		'name',
		'location_type_id',
		'firstName',
		'lastName',
		'phoneNumber',
		'address',
		'address2',
		'city',
		'state',
		'zip',
		'phone',
		'account',
		'createdAt',
		'updatedAt',
		'externalID'
	];

	public function inventories()
	{
		return $this->hasMany(\App\Models\Inventory::class, 'location');
	}
}
