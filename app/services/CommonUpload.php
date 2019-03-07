<?php
use Carbon\Carbon;
class CommonUpload
{
	/**
	*uploadImage Upload image
	*/

	public static function uploadImage($path, $inputName, $image = NULL)
	{

		$destinationPath = public_path().'/'.$path.'/';
		dd($image);
		if(Input::hasFile($inputName)){
			$file = Input::file($inputName);
			$filename = $file->getClientOriginalName();
			$uploadSuccess = $file->move($destinationPath, $filename);
			return $path.'/'.$filename;
		}
		if ($image) {
			return $image;
		}
	}

	public static function getNameTypeSlide($type)
	{
		if ($type == SLIDE_TOP) {
			return 'Banner';
		}
		if ($type == SLIDE_BOTTOM) {
			return 'Đối tác';
		}

	}

}