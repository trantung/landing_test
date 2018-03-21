<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ScheduleDetail extends Eloquent
{
    use SoftDeletingTrait;
    public $timestamps = true;

    protected $table = 'schedule_details';
    protected $fillable = [
        'student_id', 'schedule_id', 'time_id', 'type', 'level',
        'lesson_date', 'teacher_id', 'status','lesson_hour','lesson_duration', 'comment'
    ];
    protected $dates = ['deleted_at'];

	public function student()
    {
        return $this->belongsTo('Student', 'student_id', 'id');
    }

	public function schedule()
    {
        return $this->belongsTo('Schedule', 'schedule_id', 'id');
    }

	public function teacher()
    {
        return $this->belongsTo('Teacher', 'teacher_id', 'id');
    }
}