<?php

namespace App\Http\Controllers;

use auth;
use App\Models\User;
use App\Models\Batal;
use App\Models\Order;
use App\Models\Detail;
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

    // function test(Request $request) {
    //     dd("aaaaaa");
    // }

    public function addtocheckout(Request $request)
    {
        // dd($request->all());
        $user = auth()->user()->id;
        $product = Keranjang::where('user_id', $user)->get();
        $alamat = User::where('id', $user)->first();
        $order=Order::create([
            'user_id'=>$user,
            'id_product'=>$request->id,
            'total'=>$request->subtotal,
            'alamat'=>$alamat->alamat,
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
        
         Keranjang::where('user_id', $user)->delete();
        return redirect()->back()->with('success', 'Product added to cart successfully!');

    }
    public function orderproses()
    {
        $user = auth()->user()->id;
        $product = Detail::where('user_id', $user)->get();
        // dd($user);
        $post = Detail::leftJoin('tb_product', 'tb_product.id', 'tb_orderdetail.product_id') // leftJoin('nama_tabel_join', 'nama_tabel_join.id', 'nama_tabel_utama.foreign_key')
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
        )->where('tb_orderdetail.user_id', $user)->where('statusproduct', 'di proses')->get();
        // dd($post);
        //  dd($data);
        return view('orderproses', ['orderList' => $post]);
    }
    public function orderkirim()
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
            'tb_orderdetail.statusproduct', // 'nama_tabel.nama_kolom'
            'tb_product.nama_product',
            'tb_product.gambar', // 'nama_tabel.nama_kolom'
            // lanjutkan kebawah untuk ambil data yang dibutuhkan
        )->where('tb_orderdetail.user_id', $user)->where('statusproduct', 'di kirim')->get();
        

        return view('orderkirim', ['orderList' => $post]);
    }
    public function orderbatal()
    {
        $user = auth()->user()->id;
        $product = Batal::where('user_id', $user)->get();
        return view('orderbatal', ['orderList' => $product]);
    }
    public function addtobatal($id)
    {
        $user = auth()->user()->id;
        $menu = Product::where('id', $id)->first();
        $product = Detail::where('product_id', $id)->first();
        $alamat = User::where('id', $user)->first();
        $detail = Product::where('id', $user)->first();
        Batal::create([
            'user_id'=>$user,
            'id_product'=>$menu->id,
            'total'=>$menu->harga,
            'gambar'=>$menu->gambar,
            'nama_product'=>$menu->nama_product,
            'status'=>'di batalkan',
            'alamat'=>$alamat->alamat,
        ]);

        Detail::where('product_id', $id)->first()->delete();
        return redirect()->route('orderproses');
    }
    public function orderselesai()
    {
        $user = auth()->user()->id;
        $product = Selesai::where('user_id', $user)->get();
        return view('orderselesai', ['orderList' => $product]);
    }
    public function addtoselesai($id)
    {
        $user = auth()->user()->id;
        $menu = Product::where('id', $id)->first();
        $product = Detail::where('product_id', $id)->first();
        $alamat = User::where('id', $user)->first();
        $detail = Product::where('id', $user)->first();
        Selesai::create([
            'user_id'=>$user,
            'id_product'=>$product->product_id,
            'total'=>$menu->harga,
            'gambar'=>$menu->gambar,
            'nama_product'=>$menu->nama_product,
            'status'=>'selesai',
            'alamat'=>$alamat->alamat,
            'qty'=>1,

        ]);

        Detail::where('product_id', $id)->delete();
        return redirect()->back()->with('success', 'Product added to favourite successfully!');
    }
}
    




