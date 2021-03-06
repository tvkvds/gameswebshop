<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Exception;
use App\Models\Product;
use App\Models\Category;
use App\Models\Platform;
use App\Models\Cart;

class SearchController extends Controller
{
    public function index()
    {
        try
        {
            $products = Product::with(['categories', 'images'])
            ->withAvg('ratings as ratings_avg', 'rating')
            ->withCount('ratings'); 
        }
        catch(Exception $e)
        {
            return back()->withError($e->getMessage())->withInput();
        }
        
        return view('search/index', [
            'products' =>  $products->filter(request(['search', 'categories', 'platforms']))->get(),
            'categories' => Category::all(),
            'platforms' => Platform::all(),
            'cart' => Session::get('cart'),
            'cart_products' => Cart::products(),
            'cart_total' => Cart::cost(),
            'cart_amount' => Cart::amount(),
            'cart_vat' => Cart::vat()
        ]);
    }
}

