<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Product;
use App\Models\Uploads;
use App\Models\Keranjang;
use App\Models\dataproduct;
use Illuminate\Http\Request;
use Illuminate\Auth\SessionGuard;

class ProductController extends Controller
{
    public function product() {
        // $product = auth()->product()->id;
        // $data = Uploads::where('id', $product)->first();
        // return view('food', 'drink', compact('data'));
        $data = Product::all();
        return view('food', compact('data'));
    }
    public function productdrink() {
        // $product = auth()->product()->id;
        // $data = Uploads::where('id', $product)->first();
        // return view('food', 'drink', compact('data'));
        $data = Product::all();
        return view('drink', compact('data'));
    }
    public function cart()
    {
        $product = Keranjang::all();
        return view('cart', compact('product'));
    }
    public function index()

    {

        $products = Product::all();

        return view('food', compact('food'));

    }
    public function addToCart($id)

    {
    

        $product = Product::findOrFail($id);
        Keranjang::create([
            'ID_PRODUCT'=>$product->id,
            'nama'=>$product->nama_product,
            'gambar'=>$product->gambar,
            'harga'=>$product->harga,
            'qty'=>1,
        ]);


          

        $cart = session()->get('cart', []);

  

        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

        } else {

            $cart[$id] = [

                "name" => $product->nama_product,

                "quantity" => 1,

                "price" => $product->harga,

                "image" => $product->gambar,

            ];
           

        }

          

        session()->put('cart', $cart);
        

        return redirect()->back()->with('success', 'Product added to cart successfully!');

    }
    public function update(Request $request)

    {

        if($request->id && $request->quantity){

            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');

        }

    }
    public function remove(Request $request)

    {

        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);

            }

            session()->flash('success', 'Product removed successfully');

        }

    }

}
