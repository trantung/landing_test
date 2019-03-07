<?php

class SlideController extends AdminController {
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
        // dd(111);
        $data = Slide::paginate(20);
        return View::make('slide.index')->with(compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('slide.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $input['image_url'] = CommonUpload::uploadImage(UPLOADCONFIG, 'image_url');
        Slide::create(['image_url'=>$input['image_url']]);
        return Redirect::action('SlideController@index');

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
