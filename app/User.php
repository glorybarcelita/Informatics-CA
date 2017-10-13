<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function storeUser($role, $fname, $mi, $lname, $index, $bday, $contact_no, $address, $email){
        $data = new User;
        $data->role_id = $role;
        $data->activated = 'true';
        $data->first_name = $fname;
        $data->middle_name = $mi;
        $data->last_name = $lname;
        $data->school_index = $index;
        $data->birthday = $bday;
        $data->contact_no = $contact_no;
        $data->address = $address;
        $data->email = $email;
        $data->password = bcrypt('secret');
        
        if($data->save()){
            return redirect('/user/list')->with('message', 'User profile created!');  
        }
    }

    public function editUser($id){
        $data = User::where('id', $id)
            ->first();

        return $data;
    }

    public function updateUser($role, $fname, $mi, $lname, $index, $bday, $contact_no, $address, $email, $activated, $id){
        $data = User::find($id);
        $data->role_id = $role;
        $data->activated = $activated;
        $data->first_name = $fname;
        $data->middle_name = $mi;
        $data->last_name = $lname;
        $data->school_index = $index;
        $data->birthday = $bday;
        $data->contact_no = $contact_no;
        $data->address = $address;
        $data->email = $email;
        
        if($data->update()){
            return redirect('/user/list')->with('message', 'User profile updated!'); 
        }
    }

    public function userChangePassword($curr_pass, $new_pass){
        $currdb_pass = User::select('password')
                        ->where('id', Auth::user()->id)
                        ->first();

        if (Hash::check($curr_pass, $currdb_pass->password)) {
            $data = User::find(Auth::user()->id);
            $data->password = bcrypt($new_pass);
            if($data->update()){
                return back()->with('message', 'Successfully changed your password');
            }
        }
    }

    public function resetPasswordGetUserDetails($id){
        $data = User::select('users.*')
            ->where('id', $id)
            ->first();

        return $data;
    }

    public function resetPassword($userId){
        $data = User::find($userId);
        $data->password = bcrypt('secret');

        if($data->update()){
            return back()->with('message', 'Password of '.$data->first_name.' '.$data->last_name.' has been reset.');
        }
    }
}
