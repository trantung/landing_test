<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ScheduleDetailChange extends Eloquent
{
    use SoftDeletingTrait;
    public $timestamps = true;

    protected $table = 'schedule_detail_change';
    protected $fillable = [
        'schedule_detail_id', 'student_id', 'schedule_id', 'time_id', 'type', 'level',
        'lesson_date', 'teacher_id', 'status','lesson_hour','lesson_duration', 'comment'
    ];
    protected $dates = ['deleted_at'];

}