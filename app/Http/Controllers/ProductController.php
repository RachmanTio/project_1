<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Product;
use App\Models\Uploads;
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
}
