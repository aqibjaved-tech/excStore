<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 13 May 2019 06:40:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Payment
 * 
 * @property int $id
 * @property int $order
 * @property string $parentPayment
 * @property string $state
 * @property string $authID
 * @property string $authExpiration
 * @property string $authJSON
 * @property string $saleID
 * @property string $transactionFee
 * @property float $capturedAmount
 * @property string $saleJSON
 * @property string $taxjarJSON
 * @property string $refundID
 * @property string $refundJSON
 * @property \Carbon\Carbon $createdAt
 * @property \Carbon\Carbon $updatedAt
 *
 * @package App\Models
 */
class Payment extends Eloquent
{
	protected $table = 'payment';
	public $timestamps = false;

	protected $casts = [
		'order' => 'int',
		'capturedAmount' => 'float'
	];

	protected $dates = [
		'createdAt',
		'updatedAt'
	];

	protected $fillable = [
		'order',
		'parentPayment',
		'state',
		'authID',
		'authExpiration',
		'authJSON',
		'saleID',
		'transactionFee',
		'capturedAmount',
		'saleJSON',
		'taxjarJSON',
		'refundID',
		'refundJSON',
		'createdAt',
		'updatedAt'
	];
}
