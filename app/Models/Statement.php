<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 13 May 2019 06:40:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Statement
 * 
 * @property int $id
 * @property string $state
 * @property \Carbon\Carbon $start
 * @property \Carbon\Carbon $end
 * @property int $account
 * @property int $statement_type
 * @property string $sentTo
 * @property \Carbon\Carbon $paidAt
 * @property \Carbon\Carbon $createdAt
 * @property \Carbon\Carbon $updatedAt
 *
 * @package App\Models
 */
class Statement extends Eloquent
{
	protected $table = 'statement';
	public $timestamps = false;

	protected $casts = [
		'account' => 'int',
		'statement_type' => 'int'
	];

	protected $dates = [
		'start',
		'end',
		'paidAt',
		'createdAt',
		'updatedAt'
	];

	protected $fillable = [
		'state',
		'start',
		'end',
		'account',
		'statement_type',
		'sentTo',
		'paidAt',
		'createdAt',
		'updatedAt'
	];
}
