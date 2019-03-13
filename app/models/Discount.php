<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Discount extends Eloquent
{
    use SoftDeletingTrait;
    public $timestamps = true;

    protected $table = 'discounts';
    protected $fillable = [
        'percent','number'
    ];

    protected $dates = ['deleted_at'];

}	