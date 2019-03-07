<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Order extends Eloquent {

	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'orders';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = array(
		'status', 'money_pay', 'receiver_name',
		'phone_name','email','city','address','comment','total_price'
	);
    protected $dates = ['deleted_at'];

}