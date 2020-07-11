@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Profile</th>
            <th scope="col">Abonné(s)</th>
            <th scope="col">Abonnement(s)</th>
            <th scope="col">Post(s)</th>
            <th scope="col" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
    @php $i = 0 @endphp
    @foreach ($users as $user)
        <tr>
            <th scope="row">{{ ++$i }}</th>
            <td>
                <img src="{{ $user->profile->getImage() }}" alt="" class="rounded-circle shadow z-depth-2"  data-holder-rendered="true" style="height:35px;width:35px;">
                <b>{{ $user->username }}</b>
            </td>
            <td>{{ $user->profile->followers->count() }}</td>
            <td>{{ $user->following->count() }}</td>
            <td>{{ $user->posts->count() }}</td>
            <td class="text-center">
                <a href="{{ route('profiles.show', $user->username) }}" class="btn btn-primary"><i class="fa fa-eye"></i> Afficher</a>
            </td>
        </tr>
    @endforeach
    </tbody>
    </table>

</div>
@endsection
