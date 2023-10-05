<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginadmin()
    {
        return view('loginadmin');
    }
    public function login_actionadmin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if(auth()->guard('admin')->attempt(['username' => $request->input('username'),  'password' => $request->input('password')])){
            $user = auth()->guard('admin')->user();
            if($user->is_admin == 1){
                return redirect()->route('adminhome')->with('success','You are Logged in sucessfully.');
            }
        }else {
            return back()->with('error','Whoops! invalid username and password.');
        }
    }
    public function adminhome()
    {
        
        $data = Order::all();
        return view('adminhome', compact('data'));
    }
    public function adminshow($id)
    {
        $order = Order::find($id);
        return view('adminshow', compact('order'));
    }
    public function actionstatus(Request $request)
    {
        // return dd($request->all());
        // $order = Order::('id', $request->id)->first();

        Order::where('id', $request->id)
              ->update(['status' => $request->sellist1]);


        // if ($request->hasfile('status')) {            
        //     $status = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('status')->getClientOriginalName());
        //     $request->file('status')->move(public_path('status'),$status);
        // }
        // $user = User::create([
        //     'status' => $request->status,
        //     'role' => $request->role,
        //     'active' => 1
        // ]);
        


        // Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan email dan password.');
        return redirect('/adminhome');
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