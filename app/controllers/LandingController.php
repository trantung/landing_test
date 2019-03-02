<?php

class LandingController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function index()
	{
		return View::make('hung.index');
	}

}
