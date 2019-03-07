<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Product extends Eloquent {

	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'products';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = array(
		'status', 'image_url', 'color',
		'code','text','quantity','price'
	);
    protected $dates = ['deleted_at'];

}