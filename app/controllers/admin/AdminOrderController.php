<?php

class AdminOrderController extends AdminController {
    public function __construct() {
        $this->beforeFilter('admin', array('except'=>array('login','doLogin', 'logout', 'getResetPass', 'postResetPass')));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Order::paginate(20);
        return View::make('order.index')->with(compact('data'));
    }
    public function destroy($id)
    {
        //
        $image = Order::destroy($id);
        return Redirect::action('AdminOrderController@index')->withMessage('<i class="fa fa-check-square-o fa-lg"></i> Xóa thành công!');

    }

}
