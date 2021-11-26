<?php

namespace App\Http\Controllers;

use App\Models\sound;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use robertogallea\LaravelPython\Services\LaravelPython;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use function Psy\debug;


class OwnSoundsController extends Controller
{

    public function index()
    {
        try {
            $user_id = Auth::user()->id;

            $users = DB::table('sounds')
                ->select('*')
                ->join('users','sounds.user_id','=','users.id')
                ->where('user_id','=',$user_id)
                ->get()->toArray();



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


        if(isset($request->Delete) && !is_null($request->Delete)){
            dd("Delete");
        }

        if(isset($request->Play) && !is_null($request->Play))
        {
            echo shell_exec('mplayer ./sound/Test.mp3');die();


        }

        if(isset($request->Add) && !is_null($request->Add)) {


            if (is_null($request->for_all)) {
                $all = 0;
            } else {
                $all = 1;
            }
            $files = $this->moveFiles($request->sound_title);


            sound::create([
                'sound_title' => $request->sound_title,
                'sound' => $files['sound'],
                'sound_img' => $files['sound_img'],
                'for_all' => $all,
                'user_id' => Auth::user()->id,
            ]);
        }


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
