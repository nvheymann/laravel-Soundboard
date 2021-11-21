<?php

namespace App\Http\Controllers;

use App\Models\sound;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;


class OwnSoundsController extends Controller
{

    public function index()
    {
        try {
            $user_id = Auth::user()->id;

            $users = DB::select('select * from sounds where user_id = :id', ['id' => $user_id]);

            $users = array_map(function ($value) {
                return (array)$value;
            }, $users);


            return view('ownsounds', ['data' => $users]);
        }
        catch (\Exception $exception){
            return view('ownsounds');
        }
    }

    public function addSound(Request $request)
    {

        $files = $this->moveFiles($request->sound_title);

        sound::create([
            'sound_title' => $request->sound_title,
            'sound' => $files['sound'],
            'sound_img' => $files['sound_img'],
            'user_id' => Auth::user()->id,
        ]);



        return Redirect::back();
    }

    public function moveFiles($sound_title)
    {

        if(!empty($_FILES['sound_bild']['name']))
        {

            $sound_img = $_FILES['sound_bild']['name'];
            $sound = $_FILES['sound']['name'];

            $sound_img_ext = pathinfo($sound_img, PATHINFO_EXTENSION);
            $sound_ext = pathinfo($sound, PATHINFO_EXTENSION);

            $sound_img = $sound_title."_img.".$sound_img_ext;
            $sound = $sound_title.".".$sound_ext;

            $sound_img_path = 'sound/' .$sound_img;
            $sound_path ='sound/' .$sound;

            move_uploaded_file($_FILES['sound_bild']['tmp_name'],  './sound/' .$sound_img);
            move_uploaded_file($_FILES['sound']['tmp_name'],  './sound/' .$sound);
        }

        else
        {

            $sound = $_FILES['sound']['name'];


            $sound_ext = pathinfo($sound, PATHINFO_EXTENSION);


            $sound = $sound_title.".".$sound_ext;

            $sound_img_path = 'img/icon-sound.png';
            $sound_path ='sound/' .$sound;


            move_uploaded_file($_FILES['sound']['tmp_name'],  './sound/' .$sound);

        }

        return[
            'sound' => $sound_path,
            'sound_img' => $sound_img_path
        ];
    }
}
