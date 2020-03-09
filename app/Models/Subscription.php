<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 13 May 2019 06:40:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Subscription
 * 
 * @property int $id
 * @property string $status
 * @property string $plan_id
 * @property string $subscription_id
 * @property string $customer_id
 * @property \Carbon\Carbon $current_term_start
 * @property \Carbon\Carbon $current_term_end
 * @property string $subscriptionJSON
 * @property \Carbon\Carbon $createdAt
 * @property \Carbon\Carbon $updatedAt
 *
 * @package App\Models
 */
class Subscription extends Eloquent
{
	protected $table = 'subscription';
	public $timestamps = false;

	protected $dates = [
		'current_term_start',
		'current_term_end',
		'createdAt',
		'updatedAt'
	];

	protected $fillable = [
		'status',
		'plan_id',
		'subscription_id',
		'customer_id',
		'current_term_start',
		'current_term_end',
		'subscriptionJSON',
		'createdAt',
		'updatedAt'
	];
}
