@extends('layouts.app')
@section('content')

<div class="container">

    @if(!Auth::check())

        <div class="container d-inline-felx justify-content-center">
            <h1>Log dich erst ein oder erstelle dir ein Account um die Sounds zu sehen!</h1>
            <h1><a href="{{ route('login') }}" >Login</a></h1>
        </div>

    @else




    <div class="row">
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
      @endif

</div>

@endsection
