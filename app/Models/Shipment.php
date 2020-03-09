<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 13 May 2019 06:40:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Shipment
 * 
 * @property int $order
 * @property string $quantity
 * @property string $carrier
 * @property string $tracking_number
 * @property \Carbon\Carbon $date_shipped
 * @property int $id
 * @property \Carbon\Carbon $createdAt
 * @property \Carbon\Carbon $updatedAt
 *
 * @package App\Models
 */
class Shipment extends Eloquent
{
	protected $table = 'shipment';
	public $timestamps = false;

	protected $casts = [
		'order' => 'int'
	];

	protected $dates = [
		'date_shipped',
		'createdAt',
		'updatedAt'
	];

	protected $fillable = [
		'order',
		'quantity',
		'carrier',
		'tracking_number',
		'date_shipped',
		'createdAt',
		'updatedAt'
	];
}
