<?php

class CommentController extends AdminController {
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
        $data = Comment::paginate(20);
        return View::make('comment.index')->with(compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('comment.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $input['image_url'] = CommonUpload::uploadImage(UPLOADCOMMENT, 'image_url');
        Comment::create($input);
        return Redirect::action('CommentController@index');

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
        $comment = Comment::find($id);
        return View::make('comment.edit')->with(compact('comment'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = Input::all();
        // dd($input);
        $comment = Comment::find($id);
        $input['image_url'] = CommonUpload::uploadImage(UPLOADCOMMENT, 'image_url', $comment->image_url);
        $comment->update($input);
        return Redirect::action('CommentController@index');
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
        $image = Comment::destroy($id);
        return Redirect::action('CommentController@index')->withMessage('<i class="fa fa-check-square-o fa-lg"></i> Xóa thành công!');

    }


}
