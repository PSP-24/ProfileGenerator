@extends('layouts.app')

@section('content')

<div style="padding-bottom: 10px; text-align: right;">
    <a class="btn btn-primary btn-lg" href="{{ route('profiles.create')}}" role="button">Add User</a>
    <a class="btn btn-secondary btn-lg" href="{{ route('home')}}" role="button">Dashboard</a>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Gender</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Profile</th>
            <th scope="col">Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach($users as $user)
        <tr>
            <th scope="row">{{ $i }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->gender }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->address }}</td>
            <?php if( !empty($user->user_id)) { ?>
            <td><a href="/profiles/{{ $user->user_id }}/">Profile</a></td>
            <td><a href="/profiles/{{ $user->user_id }}/edit">Edit</a></td>
            <?php } else { ?>
            <td colspan="2"><a href="/profiles/{{ $user->id }}/createprofile">Create Profile</a></td>
            <?php } ?>
        </tr> 
        <?php $i++; ?>
        @endforeach
        <tr>
            <td colspan="8">{{$users->links()}}</td>
        </tr>        
    </tbody>
</table>

@endsection