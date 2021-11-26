@extends('layouts.app')
@section('content')

    @if(!Auth::check())

        <div class="container d-inline-felx justify-content-center">
            <h1>Log dich erst ein oder erstelle dir ein Account um die Sounds zu sehen!</h1>
            <h1><a href="{{ route('login') }}" >Login</a></h1>
        </div>

    @else





<div class="container d-flex justify-content-center">
    <form method="post" action="{{route('profile')}}" enctype="multipart/form-data">
        @csrf

        <h3 for="file" class="mt-3">Profilbild </h3>
        <img class="rounded " src="{{Auth::user()->user_img}}" alt="Sound-card-profile-image" height="160" width="160"/>
        <div class=" ">
            <h2 class="mr-2 mt-4">Update Profilbild</h2>
            <input type="file" class="form-control" id="pb" name="pb">
        </div>
        <button type="submit"  name="Add" value="submit" class="btn btn-primary mt-5">Submit</button>
    </form>
</div>

    @endif
@endsection
