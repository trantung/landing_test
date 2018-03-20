<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Student extends Eloquent
{
    use SoftDeletingTrait;
    public $timestamps = true;

    protected $table = 'students';
    protected $fillable = [
        'full_name', 'email', 'phone', 'address', 'gender', 'admin_id',
        'code', 'start_date', 'birth_day', 'avatar', 'level', 
        'source', 'comment', 'parent_name', 'parent_email', 'parent_phone',
    ];

    protected $dates = ['deleted_at'];

    public function schedules()
    {
        return $this->hasMany('Schedule', 'student_id', 'id');
    }

}	