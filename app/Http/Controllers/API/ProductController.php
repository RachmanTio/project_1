<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Selesai;
use App\Models\Favourite;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController;

class ProductController extends BaseController
{
    public function produk_action(Request $request){
 
    $user = auth()->user()->id;
    $Keranjang = Keranjang::create([
        'ID_PRODUCT'=>$request->id,
        'nama'=>$request->nama,
        'gambar'=>$request->gambar,
        'harga'=>$request->harga,
        'user_id' =>$user,
        'qty'=>$request->qty,
    ]);

    return $this->sendResponse($Keranjang, 'Products retrieved successfully.');


    }

    public function favourite_action(Request $request){
        $user = auth()->user()->id;
        $Favourite = Favourite::create([
            'ID_PRODUCT'=>$request->id,
            'nama'=>$request->nama,
            'gambar'=>$request->gambar,
            'harga'=>$request->harga,
            'user_id' =>$user,
            'qty'=>$request->qty,
        ]);

        return $this->sendResponse($Favourite, 'Products retrieved successfully.');
    }

    public function delete_action(Request $request
    ){
        Favourite::where('id', $request->id)->delete();
        return $this->sendResponse('succes', 'Products retrieved successfully.');
    }

    public function food_action(){
        $user = auth()->user()->id;
        $product = Product::where('kategori', 1)->get();
        return $this->sendResponse($product, 'Products retrieved successfully.');

    }

    public function drink_action(){
        $user = auth()->user()->id;
        $product = Product::where('kategori', 2)->get();
        return $this->sendResponse($product, 'Products retrieved successfully.');

    }

    public function hapus_action(Request $request){
        Keranjang::where('id', $request->id)->delete();
        return $this->sendResponse('succes', 'Products retrieved successfully.');
    }
    
    public function pencarian(Request $request)
    {
        // dd($request->all());
        $user = auth()->user()->id;
        
        $product = Product::where('nama_product', 'like', "%" . $request->nama . "%")->get();

        return $this->sendResponse($product, 'Products retrieved successfully.');
    }

    public function checkout(Request $request)
    {
        $user = auth()->user()->id;
        $product = Keranjang::where('user_id', $user)->get();
        $alamat = User::where('id', $user)->first();
        foreach ($product as $key => $value) {
           $Order = Order::create([
                'user_id'=>$user,
                'ID_PRODUCT'=>$value->id,
                'total'=>$value->harga * $value->qty,
                'gambar'=>$value->gambar,
                'nama' =>$value->nama,
                'alamat'=>$alamat->alamat,
            ]);
        }
        Keranjang::where('user_id', $user)->delete();
        return $this->sendResponse($Order, 'Products retrieved successfully.');

    }

    public function data_proses()
    {
        $user = auth()->user()->id;
        $Order = Order::where('status', 'di proses')->get();

            return $this->sendResponse($Order, 'Products retrieved successfully.');
    }

    public function data_dikirim()
    {
        $user = auth()->user()->id;
        $Order = Order::where('status', 'di kirim')->get();

        return $this->sendResponse($Order, 'Products retrieved successfully.');
    }

    public function selesai($id)
    {
     
        $user = auth()->user()->id;
        $product = Order::where('ID_PRODUCT', $id)->first();
        $alamat = User::where('id', $user)->first();
        $Selesai = Selesai::create([
            'user_id'=>$user,
            'ID_PRODUCT'=>$product->id,
            'total'=>$product->total,
            'gambar'=>$product->gambar,
            'nama'=>$product->nama,
            'status'=>'selesai',
            'alamat'=>$alamat->alamat,
        
        ]);
        Order::where('ID_PRODUCT', $id)->delete();
        return $this->sendResponse($Selesai, 'Products retrieved successfully.');
    }

}
    // {
    //     Order::where('id', $request->id)->update([                        
    //         'status' => 'selesai',
    //     ]);
    //     return $this->sendResponse('selesai', 'Products retrieved successfully.');
    // }