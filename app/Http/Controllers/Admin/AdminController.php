<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Notification;
use App\Notifications\AppNotification;
use Auth;

class AdminController extends Controller
{
    public function login()
    {
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        $page_title = 'Admin Log In';
        return view('auth.login', compact('page_title'));
    }
    public function authenticate(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if(!empty($user) && $user->status==1 && $user->hasRole($request->user_type)){
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                return redirect()->route('dashboard');
            }
            return redirect()->back()->with('error', 'Failed to login try again.!');
        }else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
    public function editProfile()
    {
        return view('admin.dashboard.edit');
    }

    public function updateProfile(Request $request)
    {   
        $user = User::where('id', Auth::user()->id)->first();
        $user->name = $request->name;

        if(empty($request->name)){
            $this->validate($request, [
                'name' => 'required',
            ]);
        }

        if(isset($request->password)){
            $this->validate($request, [
                'name' => 'required',
                'password' => 'required|same:confirm-password',
            ]);          
            
            $user->password = Hash::make($request->password);
        }

        $user->update();
        return redirect()->back()
        ->with('message','Profile updated successfully');
    }
    public function logOut()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    //Password reset
    public function forgotPassword()
    {
        $page_title = 'Forgot Password';
        return view('auth.passwords.forgot-password', compact('page_title'));
    }
    public function passwordResetLink(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
        ]);

        $user = User::where('email', $request->email)->where('status', 1)->first();
        if(!empty($user)){
            $page_title = 'Change Password';
            do{
                $verify_token = uniqid();
            }while(User::where('verify_token', $verify_token)->first());

            $user->verify_token = $verify_token;
            $user->update();

            $details = [
                'from' => 'admin-password-reset',
                'title' => "Hello! ". $user->name,
                'body' => "You are receiving this email because we recieved a password reset request for your account.",
                'verify_token' => $user->verify_token,
            ];
           
            \Mail::to($user->email)->send(new \App\Mail\Email($details));
    
            return redirect()->route('admin.login')->with('message', 'We have emailed your password reset link!');
        }else{
            return redirect()->back()->with('error', 'Your account not found.');
        }
    }
    public function resetPassword($verify_token)
    {
        $page_title = 'Reset Password';
        return view('web-views.login.change-password', compact('page_title', 'verify_token'));
    }
    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|same:confirm-password',
        ]);

        $user = User::where('verify_token', $request->verify_token)->first();
        $user->password = Hash::make($request->password);
        $user->verify_token = null;
        $user->update();

        if($user){
            return redirect()->route('admin.login')->with('message', 'You have updated password. You can login again.');
        }else{
            return redirect()->back()->with('error', 'Something went wrong try again');
        }
    }

    public function shareLink(Request $request)
    {
        $user = User::where('id', $request->user_id)->first();
        $admin = User::role('Admin')->first();

        do{
            $share_token = uniqid();
        }while(User::where('share_token', $share_token)->first());
     
        $details = [
            'greeting' => 'Hi '. $admin->name,
            'body' => 'You have shared form with Mr/Mrs. '.\Str::upper($user->name). 'on this email address '. $user->email,
            'thanks' => '',
            'actionText' => 'Fom link.',
            'actionURL' => route('step-1', $share_token),
        ];
  
        Notification::send($admin, new AppNotification($details));

        $details = [
            'greeting' => 'Hi '. $user->name,
            'body' => 'You have recieved form kindly fill it with correct data.',
            'thanks' => 'Regards MMC!',
            'actionText' => 'Form link',
            'actionURL' => route('step-1', $share_token),
        ];
  
        Notification::send($user, new AppNotification($details));

        $user->is_shared = 1;
        $user->sent_times = $user->sent_times+1;
        $user->share_token = $share_token;
        $user->save();

        if($user){
            return 1;
        }else{
            return 2;
        }
    }
}
