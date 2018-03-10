<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Schedule extends Eloquent
{
    use SoftDeletingTrait;
    public $timestamps = true;

    protected $table = 'schedules';
    protected $fillable = [
        'student_id', 'lesson_per_week', 'lesson_number', 'type', 'level',
        'start_date', 'teacher_id', 'status','lesson_duration'
    ];

    protected $dates = ['deleted_at'];

}