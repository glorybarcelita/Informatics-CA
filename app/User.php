<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
}
