<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Role extends Eloquent
{
    use SoftDeletingTrait;
    public $timestamps = true;
    
    protected $table = 'roles';
    protected $fillable = ['name'];
   
}