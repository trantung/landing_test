<?php

class ManagerSaleController extends AdminController {
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
        $roleSale = Role::findBySlug('sale');
        $input = Input::all();
        if ($roleSale) {
            $roleSaleId = $roleSale->id;
            $data = Admin::where('role_id', $roleSaleId);
            if( !empty($input['full_name']) ){
                $data = $data->where('full_name', 'LIKE', '%'.$input['full_name'].'%');
            }
            if( !empty($input['email']) ){
                $data = $data->where('email', '=', '%'.$input['email'].'%');
            }
            if( !empty($input['phone']) ){
                $data = $data->where('phone', 'LIKE', '%'.$input['phone'].'%');
            }
            $data = $data->paginate(PAGINATE);
            return View::make('manager_sale.index')->with(compact('data'));
        }
        return View::make('404');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


}
