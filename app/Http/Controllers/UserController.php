<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
   public function index(){
    $users = User::get();
    return view('users',compact('users'));
   }
   public function changeStatus(Request $request){
    $user = Auth::id(); 
    //dd($user);
    $user->status = $request->status;
    $user->save();

    return response()->json(['success'=>'Status change successfully.']);
}


public function update(User $user, Request $request)
{
    $data = $request->validate([
        'status' => 'required',
    ]);

    $user->update($data);

    return response()->json($user);
}


}
