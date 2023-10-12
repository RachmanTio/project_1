<?php

namespace App\Http\Controllers;

use auth;
use App\Models\User;
use App\Models\Batal;
use App\Models\Order;
use App\Models\Product;
use App\Models\Selesai;
use App\Models\Uploads;
use App\Models\Favourite;
use App\Models\Keranjang;
use App\Models\dataproduct;
use Illuminate\Http\Request;
use Illuminate\Auth\SessionGuard;

class ProductController extends Controller
{
    public function product($s_query = null) {
        // dd(request()->s_query);
        $dt = request()->s_query;
        
        // $product = auth()->product()->id;
        // $data = Uploads::where('id', $product)->first();
        // return view('food', 'drink', compact('data'));
        // $data = Product::where('kategori', 1)->get();
        // return view('food', compact('data'));
        

        //  if ($s_query == '0') {
        //     $s_query = null;
        //  }else{
        //     $s_query = $s_query;
        //  }

        //dd($status);
        $post = Product::query()->where('kategori', 1);

        if ($dt!=0) {
            $post = $post->where(function($query) use ($dt) {
                if ($dt !== null) {
                    $query->where(function($query) use ($dt) {
                        $query->where('nama_product', 'like', '%'.$dt.'%');
                    });
                }
            });
        }


        $data = $post->get();
        // dd($data);
        return view('food', compact('data', 's_query'));

    
    }
    public function productdrink($s_query = null) {
        // dd(request()->s_query);
        $dt = request()->s_query;
        
        // $product = auth()->product()->id;
        // $data = Uploads::where('id', $product)->first();
        // return view('food', 'drink', compact('data'));
        // $data = Product::where('kategori', 1)->get();
        // return view('food', compact('data'));
        

        //  if ($s_query == '0') {
        //     $s_query = null;
        //  }else{
        //     $s_query = $s_query;
        //  }

        //dd($status);
        $post = Product::query()->where('kategori', 2);

        if ($dt!=0) {
            $post = $post->where(function($query) use ($dt) {
                if ($dt !== null) {
                    $query->where(function($query) use ($dt) {
                        $query->where('nama_product', 'like', '%'.$dt.'%');
                    });
                }
            });
        }


        $data = $post->get();
        // dd($data);
        return view('drink', compact('data', 's_query'));

       // return view('admin.media.index', compact('post', 's_query'));
    
    }
    public function cart()
    {
        $user = auth()->user()->id;
        $product = Keranjang::where('user_id', $user)->get();
        // dd($product);
        // dd($product);
        return view('cart', ['productList' => $product]);
    }
    public function index()

    {

        $products = Kaeranjang::all();

        return view('cart', compact('cart'));

    }
    public function addToCart($id)

    {
    
        $user = auth()->user()->id;
        $product = Product::findOrFail($id);
        Keranjang::create([
            'id_product'=>$product->id,
            'nama_product'=>$product->nama_product,
            'gambar'=>$product->gambar,
            'harga'=>$product->harga,
            'user_id'=>$user,
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
    // public function update(Request $request)

    // {

    //     if($request->id && $request->quantity){

    //         $cart = session()->get('cart');

    //         $cart[$request->id]["quantity"] = $request->quantity;

    //         session()->put('cart', $cart);

    //         session()->flash('success', 'Cart updated successfully');

    //     }

    // }
    public function remove($id, Request $request)

    {
        $productId = $request->input('id');
    
    // Logic to remove the product from the cart
    Keranjang::where('id', $id)->delete();
    
    // Redirect back to the cart page or any other appropriate page
    return redirect()->route('cart');

    }
    public function favourite()
    {
        $user = auth()->user()->id;
        $product = Favourite::where('user_id', $user)->get();
        return view('favourite', ['favouriteList' => $product]);
    }
    public function addTofavourite($id)

    {
        
        $user = auth()->user()->id;
        $product = Product::findOrFail($id);
        $favourite = Favourite::where(['id_product'=> $id, 'user_id' => $user])->first();
        if (isset($favourite)) {
            Favourite::where(['id_product'=> $id, 'user_id' => $user])->update([
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
                'user_id'=>$user,
                'qty'=>1,
            ]);
        }
        


          

        $favourite = session()->get('favourite', []);

  

        if(isset($cart[$id])) {

            $favourite[$id]['quantity']++;

        } else {

            $favourite[$id] = [

                "name" => $product->nama_product,

                "quantity" => 1,

                "price" => $product->harga,

                "image" => $product->gambar,

            ];
           

        }

          

        session()->put('favourite', $favourite);
        

        return redirect()->back()->with('success', 'Product added to favourite successfully!');

    }
    public function removefavourite($id, Request $request)

    {
        $productId = $request->input('id');
    
    // Logic to remove the product from the cart
    Favourite::where('id', $id)->delete();
    
    // Redirect back to the cart page or any other appropriate page
    return redirect()->route('favourite');

    }
    public function show($id)
    {
        $product = Product::find($id);
        return view('show', compact('product'));
    }
    public function search($id)
    {
        $keyword = $request->search;
        
        $users = User::where('name', 'like', "%" . $keyword . "%")->paginate(5);
        return view('/show', compact('users'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function hasil()
    {
        return view('hasil');
    }
    public function checkout()
    {
        $user = auth()->user()->id;
        $product = Order::where('user_id', $user)->get();
        // dd($product);
        // dd($product);
        return view('checkout', ['checkouttList' => $product]);
    }
    public function addtocheckout($id)
    {
        $user = auth()->user()->id;
        $product = Keranjang::where('user_id', $user)->get();
        $alamat = User::where('id', $user)->first();
        foreach ($product as $key => $value) {
            Order::create([
                'user_id'=>$user,
                'id_product'=>$value->id,
                'total'=>$value->harga * $value->qty,
                'gambar'=>$value->gambar,
                'nama_product'=>$value->nama_product,
                'alamat'=>$alamat->alamat,
            ]);
        }
         Keranjang::where('user_id', $user)->delete();
        return redirect()->back()->with('success', 'Product added to cart successfully!');

    }
    public function orderproses()
    {
        $user = auth()->user()->id;
        // dd($user);
        $post = Order::where('status', 'di proses');
        // dd($post);
        $data = $post->get();
        //  dd($data);
        return view('orderproses', ['orderList' => $data]);
    }
    public function orderkirim()
    {
        $user = auth()->user()->id;
        $post = Order::where('status', 'di kirim');
        $data = $post->get();
        return view('orderkirim', ['orderList' => $data]);
    }
    public function orderbatal()
    {
        $user = auth()->user()->id;
        $post = Batal::where('status', 'di batalkan');
        $data = $post->get();
        return view('orderbatal', ['orderList' => $data]);
    }
    public function addtobatal($id)
    {
        
        $user = auth()->user()->id;
        $product = Keranjang::where('id_product', $id)->first();
        $alamat = User::where('id', $user)->first();
        Batal::create([
            'user_id'=>$user,
            'id_product'=>$product->id,
            'total'=>$product->harga * $product->qty,
            'gambar'=>$product->gambar,
            'nama_product'=>$product->nama_product,
            'status'=>'di batalkan',
            'alamat'=>$alamat->alamat,

        ]);

        Keranjang::where('id_product', $id)->first()->delete();
        return redirect()->route('cart');
    }
    public function orderselesai()
    {
        $user = auth()->user()->id;
        $post = Selesai::where('status', 'selesai');
        $data = $post->get();
        return view('orderselesai', ['orderList' => $data]);
    }
    public function addtoselesai($id)
    {
        $user = auth()->user()->id;
        $product = Order::where('id_product', $id)->first();
        $alamat = User::where('id', $user)->first();
        Selesai::create([
            'user_id'=>$user,
            'id_product'=>$product->id,
            'total'=>$product->total,
            'gambar'=>$product->gambar,
            'nama_product'=>$product->nama_product,
            'status'=>'selesai',
            'alamat'=>$alamat->alamat,
        ]);

        Order::where('id_product', $id)->delete();
        return redirect()->back()->with('success', 'Product added to favourite successfully!');
    }
}
    




