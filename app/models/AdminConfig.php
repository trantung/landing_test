<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class AdminConfig extends Eloquent
{
    use SoftDeletingTrait;
    public $timestamps = true;

    protected $table = 'configs';
    protected $fillable = [
        'text_header','price_header','sale_price_header','promotion_price_header',
        'text_header_common','text_fee_transfer','text_promotion_number',
        'image_body','kind_pay','fee_transfer','time_export','time_transfer','quanity'
    ];

    protected $dates = ['deleted_at'];

}	