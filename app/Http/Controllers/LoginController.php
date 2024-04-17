<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Candidate;
use Hash;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function adminLogin(){
        return view('admin.layout.login');
    }
    public function changePassword(){
      return view('candidate.change-password');
    }
    public function updatePassword(Request $req){
      $this->validate($req, [
        'old_password' => 'required',
        'new_password' => 'required',
        'confirm_password' => 'required',
      ]);
      if(request('new_password')==request('confirm_password')){
        $candidate = Candidate::findOrFail(auth()->guard('candidate')->user()->id);
        if($candidate){
          if (Hash::check(request('old_password'),$candidate->password)) {
            $candidate = Candidate::findOrFail(auth()->guard('candidate')->user()->id);
            $candidate->password = app('hash')->make(request('new_password'));
            $candidate->save();
            Auth::guard('candidate')->logout();
            return redirect()->route('login')->with('message','Password changed Success');
          } else {
            return redirect()->route('candidates.password.change')->with('error','Invalid Password, Please try to login again');
          }
        }else{
          return redirect()->route('candidates.password.change')->with('error','User doesnot Exist');
        }
      }else{
        return redirect()->route('candidates.password.change')->with('error','Please check new password and confirm password are same');
      }
      
  }
    public function AdminCheckLogin(Request $req){
        $this->validate($req, [
          'username' => 'required',
          'password' => 'required',
        ]);
        $checkExistUser = User::where('email',$req->username)->first();
        if($checkExistUser){
          $checkVerifiedUser = User::where('email',$req->username)->whereNotNull('email_verified_at')->first();
          if($checkVerifiedUser){
            $existPassword = $checkVerifiedUser->password;
            if (Hash::check($req->password, $existPassword)) {
              Auth::login($checkVerifiedUser);
              return redirect()->route('admin.dashboard')->with('message','Login Success');
            } else {
              return redirect()->route('login')->with('error','Invalid Password, Please try to login again');
            }
          }else{
            return redirect()->route('login')->with('error','User Not Verified');
          }
        }else{
          return redirect()->route('login')->with('error','Invalid Username, Please try to login again');
        }
    }
    public function login(){
        return view('candidate.layout.login');
    }
    public function checkLogin(Request $req){
        $this->validate($req, [
          'username' => 'required',
          'password' => 'required',
        ]);
        $checkExistUser = Candidate::where('email',$req->username)->first();
        if($checkExistUser){
            $existPassword = $checkExistUser->password;
            if (Hash::check($req->password, $existPassword)) {
                
              Auth::guard('candidate')->login($checkExistUser);
              return redirect()->route('candidate.dashboard')->with('message','Login Success');
            } else {
              return redirect()->route('login')->with('error','Invalid Password, Please try to login again');
            }
        }else{
          return redirect()->route('login')->with('error','Invalid Username, Please try to login again');
        }
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('login')->with('message','Successfully Logged Out!!');
      }
}
