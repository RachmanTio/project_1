<?php

namespace App\Http\Controllers\API;

use App\Models\User;
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
    // public function addgambar(Request $request)
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
