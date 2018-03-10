<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ScheduleDetail extends Eloquent
{
    use SoftDeletingTrait;
    public $timestamps = true;

    protected $table = 'schedule_details';
    protected $fillable = [
        'student_id', 'schedule_id', 'time_id', 'type', 'level',
        'lesson_date', 'teacher_id', 'status','lesson_hour','lesson_duration'
    ];
    protected $dates = ['deleted_at'];

}