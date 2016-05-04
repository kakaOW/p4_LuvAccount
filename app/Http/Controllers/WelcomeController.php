<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeController extends Controller {

    public function getIndex() {

        if(\Auth::check()) {
            return redirect()->to('/profile');
        }

        return view('welcome.index');

    }


}
