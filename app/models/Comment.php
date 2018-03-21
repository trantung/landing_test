<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Comment extends Eloquent {

	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'comments';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = array(
		'model_source', 'source_id', 'model_target',
		'target_id', 'votes', 'comment',
	);
    protected $dates = ['deleted_at'];

}