<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Selesai;
use App\Models\Favourite;
use App\Models\Keranjang;
use App\Models\Batal;
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
        'id_product'=>$request->id,
        'nama_product'=>$request->nama_product,
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
            'id_product'=>$request->id,
            'nama_product'=>$request->nama_product,
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
        
        $product = Product::where('nama_product_product', 'like', "%" . $request->nama_product . "%")->get();

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
                'id_product'=>$value->id,
                'total'=>$value->harga * $value->qty,
                'gambar'=>$value->gambar,
                'nama_product' =>$value->nama_product,
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

    public function Selesai(Request $request)
    {
        // return $this->sendResponse($request->all(), 'Products retrieved successfully.');

        // dd($request->id);
        $user = auth()->user()->id;
        $product = Keranjang::where('id_product', $request->id)->first();
        $alamat = User::where('id', $user)->first();
        $Selesai = Selesai::create([
            'user_id'=>$user,
            'id_product'=>$request->id,
            'total'=>$product->harga * $product->qty,
            'gambar'=>$request->gambar,
            'nama_product'=>$request->nama_product,
            'status'=>'Selesai',
            'alamat'=>$alamat->alamat,
        ]);

        Keranjang::where('id_product', $request->id)->delete();
        return $this->sendResponse($Selesai, 'Products retrieved successfully.');
    }


    public function batal(Request $request)
    {
        // return $this->sendResponse($request->all(), 'Products retrieved successfully.');

        // dd($request->id);
        $user = auth()->user()->id;
        $product = Keranjang::where('id_product', $request->id)->first();
        $alamat = User::where('id', $user)->first();
        $Batal = Batal::create([
            'user_id'=>$user,
            'id_product'=>$request->id,
            'total'=>$product->harga * $product->qty,
            'gambar'=>$request->gambar,
            'nama_product'=>$request->nama_product,
            'status'=>'di batalkan',
            'alamat'=>$alamat->alamat,
        ]);

        Keranjang::where('id_product', $request->id)->delete();
        return $this->sendResponse($Batal, 'Products retrieved successfully.');
    }

}