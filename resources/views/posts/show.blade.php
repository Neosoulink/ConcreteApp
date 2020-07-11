@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row py-5">
        <div class="col-12 mb-3">
            <a href=" {{ route('profiles.show',  $post->user->username ) }} " class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Profile</a>
        </div>
        <div class="col-md-4">
            <legend> {{ $post->caption }} </legend>
            <img src="{{ asset('storage').'/'.$post->image }}" alt="" class="w-100 shadow">
        </div>
        <div class="col-md-8 pl-md-5">
            <h2 class="">{{ $post->user->username }} | {{ $post->user->email }} </h2>

            <label>Description :</label>
            <p>
                {{ $post->description }}
            </p>
        </div>
    </div>
    {{-- /.row --}}
</div>
@endsection
