<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class StopSchedule extends Eloquent
{
    use SoftDeletingTrait;
    public $timestamps = true;

    protected $table = 'stop_schedules';
    protected $fillable = [
        'student_id', 'teacher_id', 'admin_id', 'start_date', 'end_date',
        'status'
    ];

    protected $dates = ['deleted_at'];
}