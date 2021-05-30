<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Cart;

class ProductController extends Controller
{
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show()
    {
        $products = Product::orderBy('id','desc')->get();

        return view('customer.product.show',compact('products'));
    }
    public function addtocart($id){
        $product = Product::find($id);
        Cart::add(uniqid(), $product->title, $product->price, 1);

        session()->flash('success','Added to cart');
        return back();
    }
    public function getCart()
    {
        return view('customer.product.cart');
    }
}
