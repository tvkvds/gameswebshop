<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Exception;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;

class HomeController extends Controller
{
    public function index()
    {
        try
        {
            $productsCarousel = Product::orderBy('created_at', 'desc')->with(['categories', 'images', 'ratings', 'platforms'])
            ->limit(5)
            ->withAvg('ratings as ratings_avg', 'rating')
            ->withCount('ratings');
        }
        catch(Exception $e)
        {
            return back()->withError($e->getMessage())->withInput();
        }

        try
        {
            $products = Product::orderBy('sold', 'desc')->with(['categories', 'images', 'ratings', 'platforms'])
            ->limit(6)
            ->withAvg('ratings as ratings_avg', 'rating')
            ->withCount('ratings');

        }
        catch(Exception $e)
        {
            return back()->withError($e->getMessage())->withInput();
        }
       

        return view('home/index', [
            'products' => $products->get(),
            'productsCarousel' => $productsCarousel->get(),
            'categories' => Category::all(),
            'cart' => Session::get('cart'),
            'cart_products' => Cart::products(),
            'cart_total' => Cart::cost(),
            'cart_amount' => Cart::amount(),
            'cart_vat' => Cart::vat()
        ]);

    }
}
