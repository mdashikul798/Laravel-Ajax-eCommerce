<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        return view('dashboard.users.login');
    }

    function checklogin(Request $request){
     $this->validate($request, [
      'username'   => 'required|email',
      'password'  => 'required'
     ]);

     $user_data = array(
      'email'  => $request->get('username'),
      'password' => $request->get('password')
     );

     if(Auth::attempt($user_data)){
      return redirect('dashboard');
     }else{
      return back()->with('error', 'Wrong Login Details');
     }

     }

    function successlogin(){
     return view('dashboard');
    }

    function adminLogout(){
     Auth::logout();
     return redirect('login');
    }

    public function changePass(){
        return view('dashboard.users.changepass');
    }

    function resetPass(Request $request){
        $this->validate($request, [
            'current_password'  => 'required',
            'password' => 'required|between:4,255|confirmed',
            'password_confirmation' => 'required'

           ]);
            try{
                if(!(Hash::check($request->get('current_password'), Auth::user()->password))){
                    return back()->with('error', "Password doesn't matched");
                }
                if(strcmp($request->get('current_password'), $request->get('password')) == 0){
                    return back()->with('error', " Your new passward can't be same");
                }
                $request->user()->fill([
                 'password' => Hash::make($request->password)
                 ])->save();
            }catch(\Exception $e){
                return back()->with('error', $e->getMessage());
            }
            Auth::logout();
           return redirect('login')->with('success', ' Password changed! Please Login!');
        }
}
