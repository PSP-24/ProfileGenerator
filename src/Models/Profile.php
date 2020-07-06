<?php

//namespace App;
namespace PSP\profilegenerator\src\Models;

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'phone', 'gender', 'address', 'postalcode'
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function path(){
        return route('profiles.show', $this);
    }
    
    public function getRouteKeyName()
    {
        return 'user_id';
    }
    
    public static function userList(){    
        $users = DB::table('profiles')
                ->rightJoin('users', 'profiles.user_id', '=', 'users.id')
                ->orderBy('users.created_at', 'desc');            
        return $users;
    }
    
    public static function createProfile($profile){
        $users = Profile::where('user_id', $profile)->exists();
        if($users) {
            return;
        } else {
            $profile = Profile::create([
                'user_id' => $profile,
                'phone' => '',
                'gender' => 'F',
                'address' => '',
                'postalcode' => '',
            ]);               
            return $profile;
        }        
    }
}
