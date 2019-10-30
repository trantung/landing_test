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
        'image_body','kind_pay','fee_transfer','time_export','time_transfer','quanity',
        'text_footer_right','text_footer_left','text_number_sale_off','text_discount_payment',
        'text_order_notify','text_footer_order','like_link','share_link','message_to', 'text_config_title', 'google_code', 'link_video',
	'fb_analytic'
    ];

    protected $dates = ['deleted_at'];

}	
