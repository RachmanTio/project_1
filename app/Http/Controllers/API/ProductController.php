<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Batal;
use App\Models\Order;
use App\Models\Detail;
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
    $product = Product::findOrFail($request->id);  
    $Keranjang = Keranjang::create([
        'id_product'=>$request->id,
        'nama_product'=>$product->nama_product,
        'gambar'=>$product->gambar,
        'harga'=>$request->harga,
        'user_id' =>$user,
        'qty'=>$request->qty,
    ]);

    return $this->sendResponse($Keranjang, 'Products retrieved successfully.');


    }

    public function favourite_action(Request $request){
        $user = auth()->user()->id;
        $product = Product::findOrFail($request->id);   
        $favourite = Favourite::where(['id_product'=> $request->id, 'user_id'=> $user])->first();
        if (isset($favourite)) {
            Favourite::where(['id_product'=> $request->id, 'user_id' => $user])->update([
                'harga'=>$product->harga,
                'qty'=>1,
            ]);
        }
        else {
        Favourite::create([
            'id_product'=>$product->id,
            'nama_product'=>$product->nama_product,
            'gambar'=>$product->gambar,
            'harga'=>$product->harga,
            'user_id' =>$user,
            'qty'=>$product->qty,
        ]);
    }

        return $this->sendResponse($product, 'Products retrieved successfully.');
    }

    public function delete_action(Request $request
    ){
        $Favourite = Favourite::where('id', $request->id)->delete();
        return $this->sendResponse($Favourite, 'Products retrieved successfully.');
    }

    public function hapus_keranjang(Request $request
    ){
        $Keranjang = Keranjang::where('id', $request->id)->delete();
        return $this->sendResponse($Keranjang, 'Products retrieved successfully.');
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
        // dd($request->all());
        // return $this->sendResponse($request->price, 'Products retrieved successfully.');
        $user = auth()->user()->id;
        $product = Keranjang::where('user_id', $user)->where('id' ,$request->id)->first();
        $alamat = User::where('id', $user)->first();

        $total = 0;

        foreach ($request->price as $key => $value) {
            $total += $value;
        }
       
            // dd($request->all());
            $order = Order::create([
                'user_id'=>$user,
                'total'=>$total,
                'alamat'=>$request->alamat,
                'qty'=>1,
    
            ]);
            if (isset($request->product_id)) {
                foreach ($request->product_id as $key => $value) {
                    // dd($value);
                   Detail::create([
                        'order_id'=>$order->id,
                        'user_id'=>$user,
                        'qty'=>1,
                        'product_id'=>$value,
                        'totalharga'=>$request->price[$key],
                    ]);
                }
            }
    
                  Keranjang::where('user_id', $user)->where('id' ,$request->id)->delete();
            return $this->sendResponse($order, 'Products retrieved successfully.');

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

    public function datafavoritcuyy(){
            $user = auth()->user()->id;
            $data_favorit = Favourite::where('user_id', $user)->get();
            if ($data_favorit){
                return $this->sendResponse($data_favorit, 'Products retrieved successfully.');
            }
        }

    public function cart(){
        $user = auth()->user()->id;
        $data_keranjang = Keranjang::where('user_id', $user)->get();
        if ($data_keranjang){
            return $this->sendResponse($data_keranjang, 'Products retrieved successfully.');
        }
    }
}