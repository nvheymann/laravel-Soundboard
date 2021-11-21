<?php

namespace App\Http\Controllers;

use App\Models\sound;
use Illuminate\Http\Request;

class SoundsController extends Controller
{

    public function index()
    {
        $data = sound::all()->toArray();

        return view('sounds',['data'=>$data]);

    }

}
