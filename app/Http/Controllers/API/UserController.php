<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();

      

        return $this->sendResponse($users, 'Products retrieved successfully.');
    }
    public function profil()
    {
        // $user = User::find($id);
        $user = auth()->user()->id;
        $users = User::where('id', $user)->get();
        return $this->sendResponse($users, 'Products retrieved successfully.');
    }

    // public function data_register()
    // {
    //     $user = auth()->user()->id;
    //     $users = User::where('id', $user)->get();
    //     return $this->sendResponse($users, 'Products retrieved successfully.');
    // }

    // public function data_register(Request $request)
    // {
    // $user = new user;
    // $user->username = $request->username;
    // $user->email = $request->email;
    // $user->password = Hash::make($request->password);
    // $user->save();
    // $token = $user->createToken->plainTextToken;
    // return response()->json($user, $token);
    // }

    // public function data_login(Request $request)
    // {
    //     $user = User::where($request->email)->firstOrFail();
    //     $token = $user->createToken->plainTextToken;
    //     return response()->json ($token);
    // }

    // public function user_profile(Request $request)
    // {      
    //     $user = auth()->user()->id;
    //     // return $this->sendResponse('tes', 'Succes');
    //     // dd($user); 
    //     $request->validate([
    //         'gambar' => 'required',
    //         'gambar.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2000'
            
    //     ]);
    //     if ($request->hasfile('gambar')) {            
    //         $gambar = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('gambar')->getClientOriginalName());
    //         $request->file('gambar')->move(public_path('gambar'), $gambar);
    //         User::where('id', $user)->update([                        
    //             'username' => $request->username,
    //             'email' => $request->email,
    //             'jeniskelamin' => $request->jeniskelamin,
    //             'gambar' => $gambar,
    //             'alamat' => $request->alamat,
    //             'tanggallahir' => $request->tanggallahir,
    //         ]);
    //         //  Uploads::create(
    //         //         [                        
    //         //             'gambar' =>$gambar
    //         //         ]
    //         //     );
    //         return $this->sendResponse('tes', 'Succes');
    //     }else{
    //         return $this->sendResponse('tes', 'gagal');
    //     }
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
