<?php

class LandingController extends Controller {

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
		$productFirst = null;
		if (Product::first()) {
			$productFirst = Product::first();
		}
		$products = Product::all();
        if ($config) {
            return View::make('hung.index')->with(compact('config', 'slides','comments','commentOrders', 'productFirst', 'products'));
        }
        $config = new AdminConfig;
        return View::make('hung.index')->with(compact('config'));
	}

	public function getBuy()
	{
		$config = AdminConfig::find(1);
		$productFirst = null;
		if (Product::first()) {
			$productFirst = Product::first();
		}
		$products = Product::all();
        return View::make('hung.product')->with(compact('products', 'config', 'productFirst'));
	}
}
