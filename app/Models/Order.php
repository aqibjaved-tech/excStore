<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 13 May 2019 06:40:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Order
 * 
 * @property int $id
 * @property string $externalOrderID
 * @property string $state
 * @property string $firstName
 * @property string $lastName
 * @property string $phoneNumber
 * @property string $email
 * @property string $shippingAddress
 * @property string $shippingCity
 * @property string $shippingState
 * @property string $shippingZip
 * @property string $shippingPhone
 * @property string $account
 * @property int $billingLocation
 * @property int $shippingLocation
 * @property int $customer
 * @property int $retailer
 * @property int $retailerExtID
 * @property int $salesAssociate
 * @property int $salesAssociateExtID
 * @property string $salesAssociateName
 * @property float $subtotal
 * @property float $sales_tax
 * @property float $shipping
 * @property float $total
 * @property string $orderPacket
 * @property string $errorLog
 * @property \Carbon\Carbon $createdAt
 * @property \Carbon\Carbon $updatedAt
 *
 * @package App\Models
 */
class Order extends Eloquent
{
	protected $table = 'order';
	public $timestamps = false;

	protected $casts = [
		'billingLocation' => 'int',
		'shippingLocation' => 'int',
		'customer' => 'int',
		'retailer' => 'int',
		'retailerExtID' => 'int',
		'salesAssociate' => 'int',
		'salesAssociateExtID' => 'int',
		'subtotal' => 'float',
		'sales_tax' => 'float',
		'shipping' => 'float',
		'total' => 'float'
	];

	protected $dates = [
		'createdAt',
		'updatedAt'
	];

	protected $fillable = [
		'externalOrderID',
		'state',
		'firstName',
		'lastName',
		'phoneNumber',
		'email',
		'shippingAddress',
		'shippingCity',
		'shippingState',
		'shippingZip',
		'shippingPhone',
		'account',
		'billingLocation',
		'shippingLocation',
		'customer',
		'retailer',
		'retailerExtID',
		'salesAssociate',
		'salesAssociateExtID',
		'salesAssociateName',
		'subtotal',
		'sales_tax',
		'shipping',
		'total',
		'orderPacket',
		'errorLog',
		'createdAt',
		'updatedAt'
	];
}
