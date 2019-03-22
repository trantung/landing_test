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
		if (!isset($input['product_id'])) {
			$productId = $input['product_id_first'];
		} else {
			$productId = $input['product_id'];
		}
		$product = Product::find($productId);
		$number = $input['number'];
		$discount = Discount::find(1);
		$config = AdminConfig::find(1);
		return View::make('hung.dat-hang')->with(compact('product','number', 'discount','config'));
	}
	public function order()
	{
		$config = AdminConfig::find(1);
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
		$productName = $product->text;
		$productCode = $product->code;
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
		// Mail::send('emails.email_student', $detail, function($message) use ($order, $detail){
  //           // $message->from('noreply@stayhomeenglish.com', 'Site Admin');
  //           $message->to('vinstoresvn@gmail.com')
  //               ->subject('Thông báo có đơn hàng mới');
  //       });
//         name	Bắt buộc	Tên khách hàng
// telephone	Bắt buộc	Điện thoại khách
// name_receiver	Bắt buộc	Tên người nhận hàng (có thể để giống tên khách)
// invoicestatus	Bắt buộc	Trạng thái đơn hàng, mặc định AutoCreated
        // subtotal	Bắt buộc	Tiền hàng, mặc định : 0
// total	Bắt buộc	Tổng tiền hàng + phụ thu - giảm trừ (nếu có) : mặc định :0
//         listProduct	Bắt buộc	Mảng các giá trị về sản phẩm trong đơn hàng
// price	Bắt buộc	Giá sản phẩm
// amount	Bắt buộc	Số lượng bán
// productName	Bắt buộc	Tên sản phẩm
// productcode	Bắt buộc

        $abit = '[
                      {
                        "name": "Hoang Xuan Du",
                        "telephone": "0123456789",
                        "name_receiver": "Mr Du",
                        "invoicestatus": "AutoCreated",
                        "city": "",
                        "district": "",
                        "address": "203 Minh Khai",
                        "note": "",
                        "hinhthucvc": "Chuyenthuong",
                        "discount_percent": "0.000",
                        "discount_amount": "0.000",
                        "s_h_amount": "0.000",
                        "ghichu1": "",
                        "ghichu2": "",
                        "notevanchuyen": "",
                        "giamgia": "0",
                        "phuthu": "0",
                        "phivanchuyen": "0",
                        "adjustment": "0.000",
                        "taxtype": "individual",
                        "deposits": 0,
                        "subtotal": 450000,
                        "taxtotal_invoice": "0.000",
                        "total": 450000,
                        "accountid": 0,
                        "list_pageitem": "289582808317941",
                        "listProduct": [
                            {
                                "price": "250000",
                                "amount": "2",
                                "productName": "SP Xoay 3 vòng",
                                "productcode": "xoay-3-vong11",
                                "weight": "100",
                                "discount_percent_product": "0",
                                "discount_amount_product": "0",
                                "tax1": "0",
                                "qtyinstock": "0"
                            },
                            {
                                "price": "298000",
                                "amount": "3",
                                "storeId": 1,
                                "productName": "Giày Boot Nam Cao Cổ Khâu Đế Màu Đen Da Sần M89-38",
                                "productcode": "M89-38222",
                                "weight": "100",
                                "discount_percent_product": "0",
                                "discount_amount_product": "0",
                                "tax1": "0",
                                "qtyinstock": "0"
                            }
                        ]
                    }
                    ]';
         
		return View::make('hung.thong-bao')->with(compact('money', 'orderId', 'config', 'abit','order', 'data', 'productName','productCode'));
	}
	public function success()
	{
		// $money
		return View::make('hung.thong-bao')->with(compact('money'));
	}
}
