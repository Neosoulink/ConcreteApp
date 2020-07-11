@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($posts as $post)
        <div class="row">
            <div class="col-md-6 offset-md-3 mb-4">
                <div>
                    <h3 class="font-weight-normal">Posté par : <b>{{ $post->user->username }}</b> <small class="h6 text-muted"> le {{  $post->created_at->format('d / m / Y à H:i:s') }} </small> </h3>
                </div>
                <hr>
                <a href="{{ route('posts.show', $post->id) }}" class="">
                    <img src="{{ asset('storage').'/'.$post->image }}" alt="" class="w-100 shadow">
                </a>
            </div>
        </div>
    @endforeach
    <div class="col-12">
        <div class="row d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
