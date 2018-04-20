<?php

class TestController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getEmail()
	{
		$lessonDetail = ScheduleDetail::find(1);
		$string = generateRandomString();
		$lessonDuration = 30;
		return View::make('emails.email_student')->with(compact('lessonDetail', 'string', 'lessonDuration'));
	}

}
