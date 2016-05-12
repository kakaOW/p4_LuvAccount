<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Response;
use Image;

class UploadController extends Controller {

    public function getUpload() {
        return view('lists.upload');
    }

    public function postUpload(Request $request) {

        // GET ALL THE INPUT DATA , $_GET,$_POST,$_FILES.
        $input = $request->file('file');


       // PASS THE INPUT AND RULES INTO THE VALIDATOR
        $this->validate($request, [
        'avatar_file' => 'image|max:3000',
        ]);


       // SET UPLOAD PATH
        $destinationPath = 'uploads';
        // GET THE FILE EXTENSION
        // $extension = $input->getClientOriginalExtension();
        // RENAME THE UPLOAD WITH RANDOM NUMBER
        $fileName = 'profile_original_' . \Auth::id().'.png';
        // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY
        $upload_success = $input->move($destinationPath, $fileName);

        $resizeImage= Image::make($destinationPath.'/'.$fileName);
        $height = $resizeImage->height();
        $width = $resizeImage->width();

        if ($height < $width) {
            $Coordinate = ($width - $height) / 2;
            $cropLargeImage = $resizeImage->crop($height,$height, $Coordinate, 0)->resize(225, 225)->save($destinationPath.'/'.'profile_225x225_'. \Auth::id().'.png', 70);
            $cropSmallImage = $cropLargeImage->resize(225, 225)->save($destinationPath.'/'.'profile_125x125_'. \Auth::id().'.png', 60);
        } elseif ($height > $width) {
            $Coordinate = ($height - $width) / 2;
            $cropLargeImage = $resizeImage->crop($width,$width,0, $Coordinate)->resize(225, 225)->save($destinationPath.'/'.'profile_225x225_'. \Auth::id().'.png', 70);
            $cropSmallImage = $cropLargeImage->resize(225, 225)->save($destinationPath.'/'.'profile_125x125_'. \Auth::id().'.png', 60);
        } else {
            $cropLargeImage = $resizeImage->resize(225, 225)->save($destinationPath.'/'.'profile_225x225_'. \Auth::id().'.png', 70);
            $cropSmallImage = $resizeImage->resize(125, 125)->save($destinationPath.'/'.'profile_125x125_'. \Auth::id().'.png', 60);
        }

        // IF UPLOAD IS SUCCESSFUL SEND SUCCESS MESSAGE OTHERWISE SEND ERROR MESSAGE

        if ($upload_success) {
            return Redirect('/profile');
        }
    }

    // public function getCrop() {
    //     $destinationPath = 'uploads';
    //
    //     $file = $destinationPath.'/profile_original_'.\Auth::id().'.png';
    //
    //     return view ('lists.crop');
    // }
    //
    // public function postCrop(Request $request) {
    //     $destinationPath = 'uploads';
    //
    //     $input = $request->all();
    //
    //     dump($input);
    //
    //     return view ('lists.crop');
    // }

}
