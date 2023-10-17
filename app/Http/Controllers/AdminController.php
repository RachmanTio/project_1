<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Detail;
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
        
        $data = Detail::leftJoin('tb_product', 'tb_product.id', 'tb_orderdetail.product_id') // leftJoin('nama_tabel_join', 'nama_tabel_join.id', 'nama_tabel_utama.foreign_key')
                        ->select(
                            'tb_orderdetail.id',
                            'tb_orderdetail.product_id',
                            'tb_orderdetail.user_id',
                            'tb_orderdetail.totalharga',
                            'tb_orderdetail.qty',
                            'tb_orderdetail.order_id',
                            'tb_orderdetail.statusproduct', // 'nama_tabel.nama_kolom'
                            'tb_product.nama_product',
                            'tb_product.gambar', // 'nama_tabel.nama_kolom'
                            // lanjutkan kebawah untuk ambil data yang dibutuhkan
                        )->get();

                        return view('adminhome', compact('data'));


    }
    public function adminshow($id)
    {

        $order = Detail::leftJoin('tb_product', 'tb_product.id', 'tb_orderdetail.product_id')
        ->where('tb_orderdetail.id', $id)
        ->select(
            'tb_orderdetail.id',
            'tb_orderdetail.product_id',
            'tb_orderdetail.user_id',
                            'tb_orderdetail.totalharga',
                            'tb_orderdetail.qty',
                            'tb_orderdetail.order_id',
                            'tb_orderdetail.statusproduct', // 'nama_tabel.nama_kolom'
                            'tb_product.nama_product',
                            'tb_product.gambar', 
        )
        ->first();
        return view('adminshow', compact('order'));
    }
    public function actionstatus(Request $request)
    {
        // return dd($request->all());
        // $order = Order::('id', $request->id)->first();

        Detail::where('id', $request->id)
              ->update(['statusproduct' => $request->sellist1]);


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
