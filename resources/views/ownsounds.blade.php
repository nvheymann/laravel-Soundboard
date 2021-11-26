@extends('layouts.app')
@section('content')

    @if(!Auth::check())

        <div class="container d-inline-felx justify-content-center">
            <h1>Log dich erst ein oder erstelle dir ein Account um die Sounds zu sehen!</h1>
            <h1><a href="{{ route('login') }}" >Login</a></h1>
        </div>

    @else



<div class="container">
    <div class="sound-card-group d-flex justify-content-center">
        <div class="mt-5 ml-3 ">
            <button type="button" class="btn" data-toggle="modal" data-target="#addSound">
                <img class="circular--square p-2" src="/img/icon-add-sound.png" alt="Sound-card-profile-image" height=85" width="85"/>
            </button>
        </div>
    </div>
</div>


<div class="container">

    <div class="modal fade" id="addSound" aria-labelledby="addSound" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new Sound</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <form action="{{Route('ownsounds')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">

                            <div class="col">
                                <label for="sound_title">Sound Title</label>
                                <input type="text" class="form-control" placeholder="Sound Title" id="sound_title" name="sound_title" required>
                            </div>

                            <div class="col">
                                <label for="file">Sound Bild (Nicht Zwingend)</label>
                                <input type="file" class="form-control" id="sound_bild" name="sound_bild">
                            </div>

                        </div>

                        <div class="form-row mt-5">

                            <div class="col">
                                <label for="file">Sound</label>
                                <input type="file" class="form-control" id="sound" name="sound" required>
                            </div>


                        </div>

                        <div class="form-row mt-5">
                            <div class="col ml-5">
                                <input type="checkbox" class="form-check-input" id="for_all" name="for_all">
                                <label class="form-check-label" for="for_all">Diesen Sound für alle freigeben</label>
                            </div>
                        </div>


                        <div class="container mt-5 d-flex justify-content-center">
                            <button type="submit"  name="Add" value="submit" class="btn btn-primary mr-2">Submit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>


                </div>

            </div>
        </div>
    </div>


    <div class="row mt-5">
        <div class="sound-card-group">
            <div class="card-deck">


                @foreach($data as $link)

                    <div class="mt-5 ml-3">
                        <img class="circular--square" src="{{$link['user_img']}}" alt="Sound-card-profile-image" height="72" width="72"/>
                        <div class="card m-3 sound-card" style="width: 15rem; ">

                            <img class="card-img-top p-1" src="{{$link['sound_img']}}" alt="Card image cap"  height="150">

                            <div class="card-body">
                                <h5 class="card-title">{{$link['sound_title']}}</h5>
                                <p class="card-text">
                                    Author: {{$link['name']}}<br>
                                </p>
                                <form action="{{Route('ownsounds')}}" method="post">
                                    @csrf
                                    <div class="container text-center">
                                        <button href="#" class="btn btn-primary" name="Delete" value="{{$link['sound']}}">Delete</button>
                                        <button href="#" class="btn btn-primary" name="Play" value="{{$link['sound']}}">Play</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>

    @endif
@endsection
