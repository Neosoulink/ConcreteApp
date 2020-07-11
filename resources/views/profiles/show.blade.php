@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row py-5 md-4">
        <div class="col-md-4 text-center">
            <img src="{{ $user->profile->getImage() }}" alt="" class="rounded-circle shadow z-depth-2"  data-holder-rendered="true" style="height:200px;width:200px;">
        </div>
        {{-- /.col --}}

        <div class="col-md-8 ">
            <div class="d-flex py-2 align-items-baseline">
                <h4 class="h4 mr-3 pb-0">{{ $user->username }}</h4>
                <btn-follow profile-id="{{ $user->profile->id }}" follows="{{ $follows }}"></btn-follow>
            </div>
            <div class="d-flex">
                <div class="mr-3"><strong> {{ $postsCount }} </strong>  Publication(s)</div>
                <div class="mr-3"><strong> {{ $followersCount }} </strong>  abonné(s)</div>
                <div class="mr-3"><strong> {{ $followingCount }} </strong>  abonnement(s)</div>
            </div>
            <div class="py-2">
                @can('update', $user->profile)
                    <a href=" {{ route('profiles.edit', $user->username) }} " class="btn btn-outline-secondary"><i class="fa fa-edit"></i> Modifier mes informations</a>
                @endcan
            </div>
            <div class="mt-3">
                <div class="font-weight-bold">{{ $user->profile->title ?? "Pas de titre" }}</div>
                <div>{{ $user->profile->description ?? "Pas de description" }}</div>
                <a href="#">{{ $user->profile->url ?? "Pas d'url" }}</a>
            </div>
        </div>
        {{-- /.col --}}

    </div>
    {{-- /.row --}}

    <div class="row">
        @foreach ($user->posts as $post)
            <div class="col-md-4">
                <a href="{{ route('posts.show', $post->id) }}" class="">
                    <img src="{{ asset('storage').'/'.$post->image }}" alt="" class="w-100 shadow">
                </a>
            </div>
            {{-- /.col --}}
        @endforeach

    </div>
    {{-- /.row --}}
</div>
@endsection
