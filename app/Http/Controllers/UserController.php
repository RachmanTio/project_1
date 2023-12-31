<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\data;
use App\Models\User;
use App\Models\Uploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function register()
    {
        return view('register');
    }
    public function home()
    {
        return view('home');
    }
    
    public function actionregister(Request $request)
    {
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'jeniskelamin' => $request->jeniskelamin,
            'role' => $request->role,
            'active' => 1
        ]);
        


        Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan email dan password.');
        return redirect('register');
    }
    public function login()
    {
        return view('login');
    }
    public function login_action(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);
    }
    public function password()
    {
        $data['title'] = 'Password';
        return view('password', $data);
    }
    public function password_action(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'new_password' => 'required|confirmed',
        ]);
        $user = User::where('email', $request->email)->firstOrFail();
        $user->password = Hash::make($request->new_password);
        $user->save();
        $request->session()->regenerate();
        return back()->with('success', 'Password changed!');
    }
    public function profile()
    {
        return view('profile');
    }
    public function addgambar(Request $request)
    {      
        $user = auth()->user()->id;
        // dd($request->all()); 

            // $request->validate([
            //     'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            //     'alamat' => 'required',
            //     'tanggallahir' => 'required',
            // ]);
            if ($request->hasfile('gambar')) {            
                $gambar = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('gambar')->getClientOriginalName());
                $request->file('gambar')->move(public_path('gambar'),$gambar);
        //    Uploads::where('id', $user)->Uploads([
        //         'gambar' => $gambar,
        //         'alamat' => $request->alamat,
        //         'tanggallahir' => $request->tanggallahir,
        //     ]);
            }
            Uploads::where('id', $user)->update([
                'gambar' => $gambar,
                'alamat' => $request->alamat,
                'tanggallahir' => $request->tanggallahir,
            ]);
    
            
            //  Uploads::create(
            //         [                        
            //             'gambar' =>$gambar
            //         ]
            //     );
            echo'Success'; 
         }
        //  else{
        //      echo'Gagal ';
        // }
        
    }
