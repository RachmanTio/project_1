<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Selesai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $user = auth()->user()->id;
        $users = User::where('id', $user)->get();
        return $this->sendResponse($users, 'Products retrieved successfully.');
    }

    public function logout_action(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Berhasil logout']);
    }

    public function invoice_cuyyy()
    {
        $productList = Selesai::get();
        $total = Selesai::sum('total');
      return $this->sendResponse([$total, $productList], 'Products retrieved successfully.');
    }

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
