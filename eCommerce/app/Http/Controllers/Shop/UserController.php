<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop\ShopUserRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;

class UserController extends Controller
{
    public function userLogin(){
        return view('shop.pages.users.login');
    }

    public function checkUserLogin(Request $request){
        $this->validate($request, [
            'email'   => 'required|email',
            'password'  => 'required'
           ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $user = ShopUserRegister::where('email', '=', $email)->first();
        if (!$user) {
            return back()->with('error', ' Login Fail, please check email id');
        }
        if (!Hash::check($password, $user->password)) {
            return back()->with('error', ' Login Fail, pls check password');
        }

        $users = ShopUserRegister::where('email', $email)->first();
        if(Session::has('login_user')){
            Session::forget('login_user');
        }
        $request->session()->put('login_user', $users);
        return redirect('/');

    }

    public function userRegistration(){
        return view('shop.pages.users.register');
    }

    public function saveUserRegistration(Request $request){
        $request->validate([
            'name' => 'required|unique:shop_user_registers',
            'email' => 'required|email|unique:shop_user_registers',
            'password' => 'required|min:4|confirmed',
            'password_confirmation' => 'required'
        ]);
        $user = new ShopUserRegister();
        $convertPass = Hash::make($request->password);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->password = $convertPass;
       // dd($request->session()->get('login_user'));

       $user->save();
        if($user){
            $request->session()->put('login_user', $user);
            return redirect('/');
        }else{
            Session::forget('login_user');
            return back()->with('error', ' Registration is not completed');
        }

    }

    public function userLogout(){
        Session::forget('login_user');
        return redirect()->back();
    }
}
