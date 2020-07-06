@extends('layouts.app')

@section('content')

<div style="padding-bottom: 10px; text-align: right;">
    <a class="btn btn-primary btn-lg" href="javascript:history.go(-1)" role="button">Cancel</a>
    <a class="btn btn-secondary btn-lg" href="{{ route('home')}}" role="button">Dashboard</a>
</div>

<form method="POST" action="/profiles/{{$profile->user_id}}">
    @csrf
    @method('PUT')
    <table class="table table-stripged">    
        <tbody>    
            <tr>
                <th scope="row">Name</th>
                <td>
                    <input type="text" 
                           class="form-control" 
                           name="name" 
                           id="name" 
                           placeholder="Willow Ondricka" 
                           maxlength="50"
                           value="{{ $profile->user->name }}">
                    @error('name')
                    <div class="alert alert-danger" role="alert" style="margin-top: 5px;">{{ $errors->first('name') }}</div>
                    @enderror
                </td>
            </tr> 
            <tr>
                <th scope="row">Password</th>
                <td>
                    <input type="password" 
                           class="form-control" 
                           name="password" 
                           id="password" 
                           placeholder="Your password here" 
                           maxlength="50"
                           value="{{ $profile->user->password }}">
                    @error('password')
                    <div class="alert alert-danger" role="alert" style="margin-top: 5px;">{{ $errors->first('password') }}</div>
                    @enderror
                </td>
            </tr> 
            <tr>
                <th scope="row">Email</th>
                <td>
                    <input type="text" 
                           class="form-control" 
                           name="email" 
                           id="email" 
                           placeholder="name@example.com" 
                           maxlength="250"
                           value="{{ $profile->user->email }}" readonly="">
                </td>
            </tr> 
            <tr>
                <th scope="row">Phone</th>
                <td>
                    <input type="text" 
                           class="form-control" 
                           name="phone" 
                           id="phone" 
                           placeholder="+1 (549) 584-7347" 
                           maxlength="20"
                           value="{{ $profile->phone }}"/>
                    @error('phone')
                    <div class="alert alert-danger" role="alert" style="margin-top: 5px;">{{ $errors->first('phone') }}</div>
                    @enderror
                </td>
            </tr> 
            <tr>
                <th scope="row">Gender</th>
                <td>
                    <input type="radio" name="gender" value="M" <?php if($profile->gender == 'M') echo "checked"; ?>/>&nbsp; Male &nbsp;
                    <input type="radio" name="gender" value="F" <?php if($profile->gender == 'F') echo "checked"; ?>/>&nbsp; Female
                </td>
            </tr> 
            <tr>
                <th scope="row">Address</th>
                <td>
                    <textarea name="address" 
                              class="form-control" 
                              id="address" 
                              maxlength="300"
                              >{{ $profile->address }}</textarea>
                    @error('address')
                    <div class="alert alert-danger" role="alert" style="margin-top: 5px;">{{ $errors->first('address') }}</div>
                    @enderror
                </td>
            </tr> 
            <tr>
                <th scope="row">PostalCode</th>
                <td>
                    <input type="text" 
                           class="form-control" 
                           name="postalcode" 
                           id="postalcode" 
                           placeholder="59431-8497" 
                           maxlength="20"
                           value="{{ $profile->postalcode }}"/>
                    @error('postalcode')
                    <div class="alert alert-danger" role="alert" style="margin-top: 5px;">{{ $errors->first('postalcode') }}</div>
                    @enderror
                </td>
            </tr> 
            <tr>
                <th scope="row">&nbsp;</th>
                <td>
                    <input class="btn btn-primary" type="submit" value="Submit">
                    <input class="btn btn-secondary" onClick="javascript:history.go(-1)" type="button" value="Cancel">
                </td>
            </tr>         
        </tbody>
    </table>
</form>

@endsection