<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController;
use App\Models\Keranjang;
use App\Models\Product;
use App\Models\Favourite;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    public function produk_action(Request $request){
 
    $user = auth()->user()->id;
    // $ID_PRODUCT = $request->input('id');
    // $nama = $request->input('nama_product');
    // $gambar = $request->input('gambar');
    // $harga = $request->input('harga');
    Keranjang::create([
        'ID_PRODUCT'=>$request->id,
        'nama'=>$request->nama,
        'gambar'=>$request->gambar,
        'harga'=>$request->harga,
        'user_id' =>$user,
        'qty'=>$request->qty,
    ]);

    return response()->json(['message' => 'Produk berhasil ditambahkan ke keranjang']);


    }

    public function favourite_action(Request $request){
        $user = auth()->user()->id;
        Favourite::create([
            'ID_PRODUCT'=>$request->id,
            'nama'=>$request->nama,
            'gambar'=>$request->gambar,
            'harga'=>$request->harga,
            'user_id' =>$user,
            'qty'=>$request->qty,
        ]);

        return response()->json(['message' => 'Produk berhasil ditambahkan ke keranjang']);

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
        // return $this->sendResponse($request->all(), 'Products retrieved successfully.');
        $user = auth()->user()->id;
        
        $product = Product::where('nama_product', 'like', "%" . $request->nama . "%")->get();

        return $this->sendResponse($product, 'Products retrieved successfully.');
    }

}