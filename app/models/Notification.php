<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Notification extends Eloquent
{
    use SoftDeletingTrait;
    public $timestamps = true;

    protected $table = 'notifications';
    protected $fillable = [
        'title', 'sender_model', 'sender_id', 'receiver_model', 'receiver_id', 'message', 'read',
    ];

    protected $dates = ['deleted_at'];

    public function receiver()
    {
        if( $this->receiver_model != null ){
            return $this->belongsTo($this->receiver_model, 'receiver_id', 'id');
        }
        return null;
    }

    public function sender()
    {
        if( $this->sender_model != null ){
            return $this->belongsTo($this->sender_model, 'sender_id', 'id');
        }
        return null;
    }

}	