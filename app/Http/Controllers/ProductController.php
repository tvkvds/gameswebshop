<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Exception;
use App\Models\Product;
use App\Models\Cart;

class ProductController extends Controller
{
    public function show($slug)
    {
        try 
        {
            
            $product = Product::where('slug', $slug)
            ->with(['categories', 'images', 'ratings', 'platforms'])
            ->withAvg('ratings as ratings_avg', 'rating')
            ->withCount('ratings')
            ->firstOrFail();
        }
        catch(Exception $e)
        {
           return back()->withError($e->getMessage())->withInput();
        }

        return view('products/show', [
            'product' => $product,
            'cart' => Session::get('cart'),
            'cart_products' => Cart::products(),
            'cart_total' => Cart::cost(),
            'cart_amount' => Cart::amount(),
            'cart_vat' => Cart::vat()  
        
        ]);
    }
}


