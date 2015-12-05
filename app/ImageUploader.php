<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManager;

class ImageUploader extends Model
{
    
	public $path = 'images/';
	public $extension = '.png';
	public $fieldName = 'image';


	/**
	 * [saveFromLocal description]
	 * @param  [type] $model   [description]
	 * @param  [type] $request [description]
	 * @return [type]          [description]
	 */
	public function saveImage($model, $request)
	{	
		$field = $this->fieldName;

		$img = file_get_contents($request);

		$save = file_put_contents($extendedName, $img);

		if ($save) {

			$model->$field = $this->path() . sha1($request) . $this->extension;
			$model->update();

		} else {
			# code...
		}		

		// if ($request->ajax()) {
		// 	return response()->json([
		// 		'success' => 1, 
		// 		'image' => $article->main_image
		// 	]);
		// }


		return response()->json(['status'=>1, 'image'=>$model->$field]);

	}

	
}
