<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            return redirect('/');
        }
        
        return back()->withErrors(['Wrong Email or Password'])->withInput(['email'=>$request['email']]);
        
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

    public function delete_user(Request $request, $id){
        User::destroy($id);
        
        return back();
    }

    public function create_user(SignupRequest $request){        
        DB::table('users')->insert([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'phone' => $request['phone'],
            'role' => 'User',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        return back()->withInput([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'phone'=>$request['phone'],
            ]);
    }

    public function update_profile(UpdateProfileRequest $request){

        $user = User::where([
            ['id', '!=', Auth::user()->id],
            ['email', $request['email']]
        ])->first();

        if($user != null){
            return back()->withInput([
                'name'=>$request['name'],
                'email'=>$request['email'],
                'phone'=>$request['phone'],
            ])->withErrors(['Email already used']);
        }
        DB::table('users')->where('id', Auth::user()->id)->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'updated_at' => now(),
        ]);

        return back()->withInput([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'phone'=>$request['phone'],
            ]);
    }
}
