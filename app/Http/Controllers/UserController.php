<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
   
    public function user_management()
    {      
        $search = request('search');
        if($search){
            $query = Client::query();
            $query->where('name', 'LIKE', '%' . $search . '%');
            $users = $query->paginate();
        }else{
            $users = Client::all();
        }
        return view('users.index', ['users' => $users]);
    }

    public function add_user()
    {
        return view('users.adduser');
    }



    public function add_client(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'number'=>'required',
        ]);
        $add = new Client();
        $add->name = $request->name;
        $add->email = $request->email;
        $add->number = $request->number;
        $add->save();
        $users = Client::all();
        return view('users.index', ['users' => $users]);
    }


    public function view_client($id)
    {
        $user = Client::where('id', $id)->first();
        return view('users.clientprofile', compact('user'));
    }

    public function edit_user($id)
    {
        $user = Client::where('id', $id)->first();
        return view('users.edituser', compact('user'));
    }



    public function update_user(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'number'=>'required',
        ]);
        $edit = [
            'name'=> $request->name,
            'email'=> $request->email,
            'number'=> $request->number,
        ];
        Client::where('id', $id)->update($edit);
        return view('users.index', ['users' => $users = Client::all()]);
    }

    
    public function delete_client($id)
    {
        Client::where('id', $id)->delete();
        return view('users.index', ['users' => $users = Client::all()]);
    }
}
