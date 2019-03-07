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
        if ($config) {
            return View::make('hung.index')->with(compact('config', 'slides'));
        }
        $config = new AdminConfig;
        return View::make('hung.index')->with(compact('config'));
	}

}
