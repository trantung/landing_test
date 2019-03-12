<?php

class OrderController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function index()
	{
		$config = AdminConfig::find(1);
		$slides = Slide::all();
		$comments = Comment::all();
		$commentOrders = CommentOrder::all();
		$productFirst = Product::first();
		$products = Product::all();
        if ($config) {
            return View::make('hung.index')->with(compact('config', 'slides','comments','commentOrders', 'productFirst', 'products'));
        }
        $config = new AdminConfig;
        return View::make('hung.index')->with(compact('config'));
	}

	public function create()
	{

	}
	public function store()
	{
		$input = Input::all();
		$product = Product::find($input['product_id']);
		$number = $input['number'];
		$discount = Discount::find(1);
		$config = AdminConfig::find(1);
		return View::make('hung.dat-hang')->with(compact('product','number', 'discount','config'));
	}
	public function order()
	{
		$input = Input::all();
		$product_id = $input['product_id'];
		$number = $input['number'];
		$config = AdminConfig::find(1);
		$numberConfig = $config->text_promotion_number;
		$config->update(['text_promotion_number' => $numberConfig - $number]);
		// //luu order
		$order = [];
		$order['money_pay'] = $input['money_pay'];
		$order['status'] = 1;
		$order['receiver_name'] = $input['fullname'];
		$order['phone_name'] = $input['phone'];
		$order['email'] = $input['email'];
		$order['city'] = $input['city'];
		$order['address'] = $input['detailed'];
		$order['comment'] = $input['remark'];
		$order['total_price'] = $input['total_price'];
		$orderId = Order::create($order)->id;
		//luu vao product_order

		$data = [];
		$product = Product::find($product_id);
		$data['product_id'] = $product_id;
		$data['order_id'] = $orderId;
		$data['quantity'] = $input['number'];
		$data['price'] = $product->price;
		$data['total_price'] = $input['total_price'];
		ProductOrder::create($data);

		$money = $input['money_pay'];
		//gui mail
		$detail = [
            'orderCode' => $orderId,
        ];
		Mail::send('emails.email_student', $detail, function($message) use ($order, $detail){
            // $message->from('noreply@stayhomeenglish.com', 'Site Admin');
            $message->to('vinstoresvn@gmail.com')
                ->subject('Thông báo có đơn hàng mới');
        });

		return View::make('hung.thong-bao')->with(compact('money', 'orderId'));
	}
	public function success()
	{
		// $money
		return View::make('hung.thong-bao')->with(compact('money'));
	}
}
