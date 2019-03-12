<?php

class AdminDiscountController extends AdminController {
    public function __construct() {
        $this->beforeFilter('admin', array('except'=>array('login','doLogin', 'logout', 'getResetPass', 'postResetPass')));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function index()
    {
        $input = Input::all();
        $discount = Discount::find(1);
        if ($discount) {
            return View::make('admin.discount')->with(compact('discount'));
        }
        $discount = new Discount;
        return View::make('admin.discount')->with(compact('discount'));
    }
    public function store()
    {
        $input = Input::all();
        $discount = Discount::find(1);
        $discount->update($input);
        
        return Redirect::action('AdminDiscountController@index');

    }

}
