<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 13 May 2019 06:40:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Account
 * 
 * @property int $id
 * @property string $companyName
 * @property bool $isParentCompany
 * @property int $parentCompanyID
 * @property string $brandName
 * @property string $storeName
 * @property int $account_type_id
 * @property string $logo
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property string $title
 * @property string $firstName
 * @property string $lastName
 * @property string $phoneNumber
 * @property string $cellNumber
 * @property string $email
 * @property string $username
 * @property int $user
 * @property bool $deleted
 * @property bool $agreed
 * @property string $api_key
 * @property int $externalID
 * @property int $externalID2
 * @property string $encryptedBankingAccount
 * @property string $encryptedRoutingNumber
 * @property bool $isPaid
 * @property int $subscription
 * @property \Carbon\Carbon $deletedAt
 * @property \Carbon\Carbon $createdAt
 * @property \Carbon\Carbon $updatedAt
 * 
 * @property \Illuminate\Database\Eloquent\Collection $inventories
 * @property \Illuminate\Database\Eloquent\Collection $product_retailers
 *
 * @package App\Models
 */
class Account extends Eloquent
{
	protected $table = 'account';
	public $timestamps = false;

	protected $casts = [
		'isParentCompany' => 'bool',
		'parentCompanyID' => 'int',
		'account_type_id' => 'int',
		'user' => 'int',
		'deleted' => 'bool',
		'agreed' => 'bool',
		'externalID' => 'int',
		'externalID2' => 'int',
		'isPaid' => 'bool',
		'subscription' => 'int'
	];

	protected $dates = [
		'deletedAt',
		'createdAt',
		'updatedAt'
	];

	protected $fillable = [
		'companyName',
		'isParentCompany',
		'parentCompanyID',
		'brandName',
		'storeName',
		'account_type_id',
		'logo',
		'address',
		'city',
		'state',
		'zip',
		'title',
		'firstName',
		'lastName',
		'phoneNumber',
		'cellNumber',
		'email',
		'username',
		'user',
		'deleted',
		'agreed',
		'api_key',
		'externalID',
		'externalID2',
		'encryptedBankingAccount',
		'encryptedRoutingNumber',
		'isPaid',
		'subscription',
		'deletedAt',
		'createdAt',
		'updatedAt'
	];

	public function inventories()
	{
		return $this->hasMany(\App\Models\Inventory::class, 'retailer');
	}

	public function product_retailers()
	{
		return $this->hasMany(\App\Models\ProductRetailer::class, 'retailer');
	}
}
