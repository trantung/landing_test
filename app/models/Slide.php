<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Slide extends Eloquent
{
    use SoftDeletingTrait;
    public $timestamps = true;

    protected $table = 'slides';
    protected $fillable = [
        'status','image_url'
    ];

    protected $dates = ['deleted_at'];

}	