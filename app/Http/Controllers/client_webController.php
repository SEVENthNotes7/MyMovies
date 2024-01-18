<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\tableMyVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


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
        $data = tableMyVideo::all()->sortBy('created_by');
        return view('client.web_pages.home', compact('data'));
    }
    public function viewSearch()
    {
        return view('client.web_pages.search');
    }
    public function viewMyVideos($id)
    {
        $id = decrypt($id);
        $data = tableMyVideo::where('Authors_id', $id)->get();
        return view('client.web_pages.myvideos', compact('data'));
    }
    public function myProfile($id)
    {
        $id = decrypt($id);
        return view('client.web_pages.profile');
    }
    public function videoPlayer($id)
    {
        $id = decrypt($id);
        $video = tableMyVideo::where('id', $id)->first();
        return view('client.web_pages.playVideo', compact('video'));
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
    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
    public function userUploadVideo(Request $request, $id)
    {
        $id = decrypt($id);
        $created_at = Carbon::now()->toDateString();

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'tumbnail' => 'required',
            'video' => 'required'
        ]);

        $data = $request->all();

        $tumbnail = $request->file('tumbnail');
        $video = $request->file('video');

        $destinationPath_tumbnail = 'images/tumbnails';
        $destinationPath_videos = 'images/videos';

        $profileTumbnail = date('YmdHis') . "." . $tumbnail->getClientOriginalExtension();
        $profileVideo = date('YmdHis') . "." . $video->getClientOriginalExtension();

        $tumbnail->move($destinationPath_tumbnail, $profileTumbnail);
        $video->move($destinationPath_videos, $profileVideo);

        $data['tumbnail'] = $profileTumbnail;
        $data['videos'] = $profileVideo;

        tableMyVideo::insert([
            'Authors_id' => $id,
            'title' => $data['title'],
            'description' => $data['description'],
            'tumbnail' => $data['tumbnail'],
            'video' => $data['videos'],
            'created_at' => $created_at
        ]);

        return $this->viewMyVideos(encrypt($id))->with('message', 'Video uploades successfully.');
    }
    public function editUserVideo($id)
    {
        $id = decrypt($id);
        $data = tableMyVideo::where('id', $id)->first();
        return view('client.web_pages.edit', compact('data'));
    }
    public function userDeleteVideo($id, $image, $video)
    {
        $id = decrypt($id);
        if ($id != null) {
            tableMyVideo::where('id', $id)->delete();
            File::delete(public_path('images/tumbnails/' . $image)); //delete tumbnail
            File::delete(public_path('images/videos/' . $video)); //delete video
        }
        return $this->viewMyVideos(encrypt($id));
    }
    public function updateUserVideos(Request $request, $id)
    {
        $id = decrypt($id);
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $data = $request->all();
        dd($data);
    }
}
