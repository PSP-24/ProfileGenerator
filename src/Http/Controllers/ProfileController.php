<?php

namespace PSP\profilegenerator\src\Http\Controllers;

use App\Http\Controllers\Controller;
use PSP\profilegenerator\src\Models\Profile;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Profile::userList()->paginate(15); 
        return view('PSP::profiles.index', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('PSP::profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
           'name' => ['required', 'string', 'max:255'],
           'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
           'password' => ['required', 'string', 'min:8'],
           'phone' => ['required','max:20'],
           'address' => ['required','max:255'],
           'postalcode' => ['required','max:20'],
        ]); 
        
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password'))
        ]);
        $profile = Profile::create([
            'user_id' => $user->id,
            'phone' => request('phone'),
            'gender' => request('gender'),
            'address' => request('address'),
            'postalcode' => request('postalcode')
        ]);        
        return redirect(route('profiles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        return view('PSP::profiles.show', ['profile'=>$profile]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('PSP::profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        request()->validate([
           'name' => ['required', 'string', 'max:255'],
           'password' => ['required', 'string', 'min:8'],
           'phone' => ['required','max:20'],
           'address' => ['required','max:255'],
           'postalcode' => ['required','max:20'],
        ]);                        
        $profile->update([
            'phone' => request('phone'),
            'gender' => request('gender'),
            'address' => request('address'),
            'postalcode' => request('postalcode')
        ]);       
        $user = $profile->user->update([
            'name' => request('name'),
            'password' => Hash::make(request('password'))
        ]);
        return redirect(route('profiles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
    
    public function createprofile($profile) {
        $profileId = Profile::createProfile($profile);
        if($profileId) {
            return view('PSP::profiles.edit', ['profile'=>$profileId]);
        } else {
            return redirect(route('profiles.index'));
        }        
    }
}
