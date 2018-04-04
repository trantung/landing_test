<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Teacher extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'teachers';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	protected $fillable = array(
		'email', 'password', 'role_id', 'username', 'image_url', 
		'note', 'phone', 'date_register', 'banking_number', 'full_name', 'level',
		'admin_id', 'skype'
	);
    protected $dates = ['deleted_at'];

    public function role()
    {
        return $this->belongsTo('Role', 'role_id', 'id');
    }
}
