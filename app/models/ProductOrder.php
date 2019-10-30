<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ProductOrder extends Eloquent {

	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'product_order';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = array(
		'product_id', 'order_id', 'quantity',
		'price','total_price'
	);
    protected $dates = ['deleted_at'];

    public static function getNameProductByOrder($orderId)
    {
    	$listProduct = ProductOrder::where('order_id', $orderId)->get();
    	$productName = '';
    	foreach ($listProduct as $key => $value) {
    		$product = Product::find($value->product_id);
    		if ($product) {
    			$productName .= $product->text . '+'. $product->color . ' ,' . $product->code;
    		}
    		
    	}
    	return $productName;
    }
}
