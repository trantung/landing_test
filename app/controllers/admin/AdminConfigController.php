<?php

class AdminConfigController extends AdminController {
    public function __construct() {
        $this->beforeFilter('admin', array('except'=>array('login','doLogin', 'logout', 'getResetPass', 'postResetPass')));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getConfig()
    {
        $input = Input::all();
        $config = AdminConfig::find(1);
        if ($config) {
            return View::make('admin.config')->with(compact('config'));
        }
        $config = new AdminConfig;
        return View::make('admin.config')->with(compact('config'));
    }
    public function updateConfig()
    {
        $input = Input::all();
        $config = AdminConfig::find(1);
        $input['image_body'] = CommonUpload::uploadImage(UPLOADCONFIG, 'image_body', $config->image_body);
        $config->update($input);
        
        return Redirect::action('AdminConfigController@getConfig');

    }


}
