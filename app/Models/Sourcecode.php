<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 13 May 2019 06:40:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Sourcecode
 * 
 * @property int $id
 * @property string $sourceID
 * @property string $catalog
 * @property string $landingCode
 * @property string $sourceDescription
 * @property string $startDate
 * @property string $sourceCodeOriginator
 * @property float $transferRate
 * @property bool $mfgMustShip
 * @property bool $active
 * @property int $account
 * @property \Carbon\Carbon $createdAt
 * @property \Carbon\Carbon $updatedAt
 *
 * @package App\Models
 */
class Sourcecode extends Eloquent
{
	protected $table = 'sourcecode';
	public $timestamps = false;

	protected $casts = [
		'transferRate' => 'float',
		'mfgMustShip' => 'bool',
		'active' => 'bool',
		'account' => 'int'
	];

	protected $dates = [
		'createdAt',
		'updatedAt'
	];

	protected $fillable = [
		'sourceID',
		'catalog',
		'landingCode',
		'sourceDescription',
		'startDate',
		'sourceCodeOriginator',
		'transferRate',
		'mfgMustShip',
		'active',
		'account',
		'createdAt',
		'updatedAt'
	];
}
