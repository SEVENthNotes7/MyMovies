<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class client_webController extends Controller
{
    public function viewLogin()
    {
        return view('client.auth_pages.login');
    }
    public function viewRegister()
    {
        return view('client.auth_pages.register');
    }
    public function cancelRegister()
    {
        return redirect(route('view.login'));
    }
    public function viewHome()
    {
        return view('client.web_pages.home');
    }
    public function viewMyVideos($id){
        $id = decrypt($id);
        return view('client.web_pages.myvideos');
    }
    public function myProfile($id){
        $id = decrypt($id);
        dd($id);
        return view('client.web_pages.profile');
    }

    public function registerAccount(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users',
            'newpassword' => 'required|min:6',
            'confirmpassword' => 'required|min:6'
        ]);

        $created_at = Carbon::now()->toDateString();
        $data = $request->all();

        if ($data['newpassword'] === $data['confirmpassword']) {
            User::insert([
                'fname' => $data['firstname'],
                'lname' => $data['lastname'],
                'email' => $data['email'],
                'password' => Hash::make($data['newpassword']),
                'created_at' => $created_at
            ]);
            return redirect(route('view.login'))->with('message', 'Account Created Successfully.');
        } else {
            return redirect(route('view.register'))->with('message', 'Password did not match.');
        }
    }
    public function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect(route('Home'));
        } else {
            return redirect(route('view.login'))->with('message', 'Login Failed!');
        }
    }
    public function userUploadVideo(Request $request, $id){
        $data = $request->all();
        $id = decrypt($id);
        dd($data);
    }
}
