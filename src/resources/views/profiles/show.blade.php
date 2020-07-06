@extends('layouts.app')

@section('content')

<div style="padding-bottom: 10px; text-align: right;">
    <a class="btn btn-primary btn-lg" href="javascript:history.go(-1)" role="button">Back</a>
    <a class="btn btn-secondary btn-lg" href="{{ route('home')}}" role="button">Dashboard</a>
</div>
<table class="table table-striped">
    <tbody>
        <tr>
            <th scope="row">Name</th>
            <td>{{ $profile->user->name }}</td>
        </tr> 
        <tr>
            <th scope="row">Email</th>
            <td>{{ $profile->user->email }}</td>
        </tr> 
        <tr>
            <th scope="row">Phone</th>
            <td>{{ $profile->phone }}</td>
        </tr> 
        <tr>
            <th scope="row">Gender</th>
            <?php if($profile->gender == 'M') {$gender = "Male";} else {$gender = "Female";}?>
            <td>{{ $gender }}</td>
        </tr> 
        <tr>
            <th scope="row">Address</th>
            <td>{{ $profile->address }}</td>
        </tr> 
        <tr>
            <th scope="row">PostCode</th>
            <td>{{ $profile->postalcode }}</td>
        </tr> 
        <tr>
            <th scope="row">Created</th>
            <td>{{ $profile->created_at }}</td>
        </tr> 
        <tr>
            <th scope="row"></th>
            <td><a class="btn btn-primary btn-lg" href="/profiles/{{ $profile->user_id }}/edit" role="button">Edit</a></td>
        </tr>
    </tbody>
</table>

@endsection