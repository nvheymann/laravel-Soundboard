<?php

namespace App\Http\Controllers;

use App\Models\sound;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SoundsController extends Controller
{

    public function index()
    {

        $data = DB::table('sounds')
            ->select('*')
            ->join('users','sounds.user_id','=','users.id')
            ->where('for_all','=','1')
            ->get()->toArray();

        $data = array_map(function ($value) {
            return (array)$value;
        }, $data);

        return view('sounds',['data'=>$data]);

    }

}
