<?php

namespace App\Http\Controllers;

use App\Models\sound;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function update(Request $request)
    {

        $pb = $this->movefile();
        $user_id = Auth::user()->id;

        User::where('id', $user_id)->update(array('user_img' => $pb));

        return Redirect::back();

    }

    public function movefile()
    {


        $pb = $_FILES['pb']['name'];


        move_uploaded_file($_FILES['pb']['tmp_name'],  './user_uploads/' .$pb);

        return './user_uploads/' .$pb;

    }
}

