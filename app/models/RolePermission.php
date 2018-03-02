<?php
// use Illuminate\Database\Eloquent\SoftDeletingTrait;
class RolePermission extends Eloquent
{
    // use SoftDeletingTrait;
    
    protected $table = 'role_permission';
    protected $fillable = ['role_id', 'permission'];

}