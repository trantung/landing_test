<?php
// use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Role extends Eloquent
{
    use SluggableTrait;
    // use SoftDeletingTrait;
    public $timestamps = false;
    
    protected $sluggable = array(
        'build_from' => 'name',
        'save_to'    => 'slug',
        // 'separator' => '_'
    );

    protected $table = 'roles';
    protected $fillable = ['name', 'slug'];

    public function permissions()
    {
        return $this->hasMany('RolePermission', 'role_id', 'id');
    }
}