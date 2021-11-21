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
                                <input type="text" class="form-control" placeholder="Sound Title" id="sound_title" name="sound_title">
                            </div>

                            <div class="col">
                                <label for="file">Sound Bild</label>
                                <input type="file" class="form-control" id="sound_bild" name="sound_bild">
                            </div>

                        </div>
                        <div class="form-row">

                            <div class="col">
                                <label for="file">Sound</label>
                                <input type="file" class="form-control" id="sound" name="sound">
                            </div>

                        </div>
                        <button type="submit"  name="Add" value="submit" class="btn btn-primary">Submit</button>
                    </form>


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send message</button>
                </div>
            </div>
        </div>
    </div>


    <div class="row mt-5">
        <div class="sound-card-group">
            <div class="card-deck">


                @foreach($data as $link)

                    <div class="mt-5 ml-3">
                        <img class="circular--square" src="img/icon-profile.png" alt="Sound-card-profile-image" height="72" width="72"/>
                        <div class="card m-3 sound-card" style="width: 15rem; ">

                            <img class="card-img-top p-1" src="{{$link['sound_img']}}" alt="Card image cap"  height="150">

                            <div class="card-body">
                                <h5 class="card-title">{{$link['sound_title']}}</h5>
                                <p class="card-text">
                                    Author: Nico<br>
                                    Category: Lustig, Test
                                </p>
                                <div class="container text-center" >
                                    <button href="#" class="btn btn-primary">Edit</button>
                                    <button href="#" class="btn btn-primary">Play</button>
                                </div>
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
