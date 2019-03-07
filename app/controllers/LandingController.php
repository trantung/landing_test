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
        if ($config) {
            return View::make('hung.index')->with(compact('config'));
        }
        $config = new AdminConfig;
        return View::make('hung.index')->with(compact('config'));
	}

}
