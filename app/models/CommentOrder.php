<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class CommentOrder extends Eloquent {

	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'comment_orders';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = array(
		'status', 'time', 'name',
		'comment'
	);
    protected $dates = ['deleted_at'];

}