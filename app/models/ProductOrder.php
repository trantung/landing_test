<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ProductOrder extends Eloquent {

	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'product_order';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = array(
		'product_id', 'order_id', 'quantity',
		'price','total_price'
	);
    protected $dates = ['deleted_at'];

}