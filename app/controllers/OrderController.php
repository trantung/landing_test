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
		return View::make('hung.dat-hang')->with(compact('product','number', 'discount'));
	}
	public function order()
	{
		$input = Input::all();
		dd($input);
		//luu vao google sheet
	}
	public function success()
	{

	}
}
