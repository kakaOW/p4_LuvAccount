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
        'file' => 'image|max:3000',
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
            $cropSmallImage = $cropLargeImage->resize(125, 125)->save($destinationPath.'/'.'profile_125x125_'. \Auth::id().'.png', 60);
        } elseif ($height > $width) {
            $Coordinate = ($height - $width) / 2;
            $cropLargeImage = $resizeImage->crop($width,$width,0, $Coordinate)->resize(225, 225)->save($destinationPath.'/'.'profile_225x225_'. \Auth::id().'.png', 70);
            $cropSmallImage = $cropLargeImage->resize(125, 125)->save($destinationPath.'/'.'profile_125x125_'. \Auth::id().'.png', 60);
        } else {
            $cropLargeImage = $resizeImage->resize(225, 225)->save($destinationPath.'/'.'profile_225x225_'. \Auth::id().'.png', 70);
            $cropSmallImage = $resizeImage->resize(125, 125)->save($destinationPath.'/'.'profile_125x125_'. \Auth::id().'.png', 60);
        }

        // IF UPLOAD IS SUCCESSFUL SEND SUCCESS MESSAGE OTHERWISE SEND ERROR MESSAGE

        if ($upload_success) {
            $user = \App\User::find(\Auth::id());
            $user->profileImg = $fileName;
            $user->save();
            return Redirect('/profile/upload');
        }
    }

    // Upload Header Image
    public function getListUpload($id = null) {
    $list = \App\Lists::find($id);
    if(is_null($list)) {
        \Session::flash('message','List not found');
        return redirect('/');
        }

    if(\Auth::id() == $list->user_id) {
        return view('lists.uploadList')->with ([
            'lists' => $list,
        ]);

    } else{
        \Session::flash('message','Unauthorize to edit');
        return redirect('/show/'.$id);
    }

    }

    public function postListUpload(Request $request) {

        // GET ALL THE INPUT DATA , $_GET,$_POST,$_FILES.
        $input = $request->file('listImg');


       // PASS THE INPUT AND RULES INTO THE VALIDATOR
        $this->validate($request, [
        'listImg' => 'image|max:3000',
        ]);


       // SET UPLOAD PATH
        $destinationPath = 'uploads';
        // GET THE FILE EXTENSION
        // $extension = $input->getClientOriginalExtension();
        // RENAME THE UPLOAD WITH RANDOM NUMBER
        $fileName = 'list_original_' . \Auth::id().'_'.$request->id.'.png';
        // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY
        $upload_success = $input->move($destinationPath, $fileName);

        $resizeImage= Image::make($destinationPath.'/'.$fileName);
        $height = $resizeImage->height();
        $width = $resizeImage->width();

        if ($height < $width) {
            $Coordinate = ($width - $height) / 2;
            $cropLargeImage = $resizeImage->crop($height,$height, $Coordinate, 0)->resize(250, 250)->save($destinationPath.'/'.'list_250x250_'. \Auth::id().'_'.$request->id.'.png', 70);
            $cropMediumImage = $cropLargeImage->resize(150, 150)->save($destinationPath.'/'.'list_150x150_'. \Auth::id().'_'.$request->id.'.png', 70);
            $cropSmallImage = $cropLargeImage->resize(125, 125)->save($destinationPath.'/'.'list_125x125_'. \Auth::id().'_'.$request->id.'.png', 60);

        } elseif ($height > $width) {
            $Coordinate = ($height - $width) / 2;
            $cropLargeImage = $resizeImage->crop($width,$width,0, $Coordinate)->resize(250, 250)->save($destinationPath.'/'.'list_250x250_'. \Auth::id().'_'.$request->id.'.png', 70);
            $cropMediumImage = $cropLargeImage->resize(150, 150)->save($destinationPath.'/'.'list_150x150_'. \Auth::id().'_'.$request->id.'.png', 70);
            $cropSmallImage = $cropLargeImage->resize(125, 125)->save($destinationPath.'/'.'list_125x125_'. \Auth::id().'_'.$request->id.'.png', 60);
        } else {
            $cropLargeImage = $resizeImage->resize(250, 250)->save($destinationPath.'/'.'list_250x250_'. \Auth::id().'_'.$request->id.'.png', 70);
            $cropMediumImage = $resizeImage->resize(150, 150)->save($destinationPath.'/'.'list_150x150_'. \Auth::id().'_'.$request->id.'.png', 70);
            $cropSmallImage = $resizeImage->resize(125, 125)->save($destinationPath.'/'.'list_125x125_'. \Auth::id().'_'.$request->id.'.png', 60);
        }

        // IF UPLOAD IS SUCCESSFUL SEND SUCCESS MESSAGE OTHERWISE SEND ERROR MESSAGE

        if ($upload_success) {
            $list = \App\Lists::find($request->id);
            $list->listImg = $fileName;
            $list->save();
            return Redirect('/upload/'.$request->id);
        }
    }



}
