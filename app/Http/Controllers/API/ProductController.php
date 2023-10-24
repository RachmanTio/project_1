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
use App\Models\orderdetail;

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

    public function checkout(Request $request){
        $user = auth()->user()->id;
        $alamat = User::where('id', $user)->first();
        $product = Keranjang::where('user_id', $user)->get();
        $Keranjang = Keranjang::whereIn('id', $request->keranjang_id)->get();
        // return $this->sendResponse($Keranjang, 'Products retrieved successfully.');
        $total = 0;
        foreach ($Keranjang as $key => $value) {
                $total += $value->harga;
                    }
                $order = Order::create([
                        'user_id'=>$user,
                        'total'=>$total,
                        'alamat'=>$alamat->alamat,
                        'qty'=>1,
            
                    ]);
                    if (isset($Keranjang)) {
                            foreach ($Keranjang as $key => $value) {
                                 $detail =  orderdetail::create([
                                            'order_id'=>$order->id,
                                            'user_id'=>$user,
                                            'qty'=>1,
                                            'product_id'=>$value->id_product,
                                            'alamat'=>$alamat->alamat,
                                            'totalharga'=>$value->harga,
                                        ]);
                                    }
                                }
            Keranjang::where('user_id', $user)->delete();
             return $this->sendResponse([$order, $detail], 'Products retrieved successfully.');
                                    //  return $this->sendResponse($order,'Products retrieved successfully.');
                                }

    public function data_proses()
    {
        $user = auth()->user()->id;
        $product = Detail::where('user_id', $user)->get();
        // $Order = Order::where('status', 'di proses')->get();
        $post = Detail::leftJoin('tb_product', 'tb_product.id', 'tb_orderdetail.product_id') // leftJoin('nama_tabel_join', 'nama_tabel_join.id', 'nama_tabel_utama.foreign_key')
        ->select(
            'tb_orderdetail.id',
            'tb_orderdetail.product_id',
            'tb_orderdetail.user_id',
            'tb_orderdetail.totalharga',
            'tb_orderdetail.qty',
            'tb_orderdetail.order_id',
            'tb_orderdetail.alamat',
            'tb_orderdetail.statusproduct', // 'nama_tabel.nama_kolom'
            'tb_product.nama_product',
            'tb_product.gambar', // 'nama_tabel.nama_kolom'
            // lanjutkan kebawah untuk ambil data yang dibutuhkan
        )->where('tb_orderdetail.user_id', $user)->where('statusproduct', 'di proses')->get();

        return $this->sendResponse($post, 'Products retrieved successfully.');
    }

    public function hapus_proses(Request $request){
        Detail::where('id', $request->id)->first()->delete();
        return $this->sendResponse('succes', 'Products retrieved successfully.');
    }

    public function data_dikirim()
    {
        $user = auth()->user()->id;
        $product = Detail::where('user_id', $user)->get();

        $post = Detail::leftJoin('tb_product', 'tb_product.id', 'tb_orderdetail.product_id') // leftJoin('nama_tabel_join', 'nama_tabel_join.id', 'nama_tabel_utama.foreign_key')
        ->select(
            'tb_orderdetail.id',
            'tb_orderdetail.product_id',
            'tb_orderdetail.user_id',
            'tb_orderdetail.totalharga',
            'tb_orderdetail.qty',
            'tb_orderdetail.order_id',
            'tb_orderdetail.alamat',
            'tb_orderdetail.statusproduct', // 'nama_tabel.nama_kolom'
            'tb_product.nama_product',
            'tb_product.gambar', // 'nama_tabel.nama_kolom'
            // lanjutkan kebawah untuk ambil data yang dibutuhkan
        )->where('tb_orderdetail.user_id', $user)->where('statusproduct', 'di kirim')->get();

        return $this->sendResponse($post, 'Products retrieved successfully.');
    }

    public function selesai(Request $request)
    {
        $user = auth()->user()->id;
        $Order = Order::where('id', $request->order_id)->first();
        $Orderdetail = orderdetail::where('order_id', $Order->id)->get();

        foreach ($Orderdetail as $key => $value) {
            # code...
        
       $Selesai = Selesai::create([
        'user_id'=>$user,
        'id_product'=>$value->product_id,
        'total'=>$value->totalharga * $value->qty,
        'status'=>'selesai',
        'alamat'=>$value->alamat,
            'qty'=>1,

        ]);
    }
    Orderdetail::where('user_id', $user)->delete();
    return $this->sendResponse($Order,'Products retrieved successfully.');
     
    }

    public function batal(Request $request)
    {
        $user = auth()->user()->id;
        $Order = Order::where('id', $request->order_id)->first();
        $Orderdetail = orderdetail::where('order_id', $Order->id)->get();

        foreach ($Orderdetail as $key => $value) {
        $Batal = Batal::create([
            'user_id'=>$user,
            'id_product'=>$value->product_id,
            'total'=>$value->totalharga * $value->qty,
            'status'=>'selesai',
            'alamat'=>$value->alamat,
        ]);
    }

        Orderdetail::where('user_id', $user)->delete();
        return $this->sendResponse($Order, 'Products retrieved successfully.');
    
}



    // public function batal(Request $request)
    // {
    //     // return $this->sendResponse($request->all(), 'Products retrieved successfully.');

    //     // dd($request->id);
    //     $user = auth()->user()->id;
    //     $menu = Product::where('id', $request->id)->first();
    //     $detail = Product::where('id', $user)->first();
    //     $product = Keranjang::where('id_product', $request->id)->first();
    //     $alamat = User::where('id', $user)->first();
    //     $Batal = Batal::create([
    //         'user_id'=>$user,
    //         'id_product'=>$request->id,
    //         'total'=>$product->harga * $product->qty,
    //         'gambar'=>$request->gambar,
    //         'nama_product'=>$request->nama_product,
    //         'status'=>'di batalkan',
    //         'alamat'=>$alamat->alamat,
    //     ]);

    //     Keranjang::where('id_product', $request->id)->delete();
    //     return $this->sendResponse($Batal, 'Products retrieved successfully.');
    // }

    public function data_batal()
    {
        $user = auth()->user()->id;
        $product = batal::join('tb_product', 'tb_product.id', '=', 'tb_batal.id_product')
        ->select('tb_batal.*', 'tb_product.gambar','tb_product.nama_product')
        ->where('user_id', $user)->get();
        return $this->sendResponse($product, 'Products retrieved successfully.');
        
    }

    public function data_selesai()
    {
        $user = auth()->user()->id;
        $product = Selesai::join('tb_product', 'tb_product.id', '=', 'tb_selesai.id_product')
        ->select('tb_selesai.*', 'tb_product.gambar','tb_product.nama_product')
        ->where('user_id', $user)->get();
        return $this->sendResponse($product, 'Products retrieved successfully.');
        
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

    public function total()
    {
        $user = auth()->user()->id;
        $order = Order::where('user_id', $user)->orderBy('id','desc')->first();
        return $this->sendResponse($order, 'Products retrieved successfully.');
    
    }
}