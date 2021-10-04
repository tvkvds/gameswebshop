<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Cart extends Model
{
    //creates or updates a cart in session
    public static function Cart(array $items)
    {
        if (Session::get('cart'))
        {
            
            $cart = Session::get('cart');

            foreach ($items as $product => $amount)
            {
                if (isset($items[$product]) && isset($cart[$product])) 
                {
                    $cart[$product] = $items[$product];
                }
                else
                {
                    $cart += array($product => $amount);
                }  
            }

            foreach ($cart as $product => $amount)
            {
                if ($amount === 0 || $amount === '0')
                {
                    unset($cart[$product]);
                }
            }

            Session::put('cart', $cart);

            return Session::get('cart');
        }
        else 
        {
            foreach ($items as $product => $amount)
            {
                if ($amount === 0 || $amount === '0')
                {
                    unset($items[$product]);
                }
            }

            Session::put('cart', $items);

            return Session::get('cart');
        }
    }

    //retrieves all products currently in cart from session
    public static function products()
    {
        if (Session::get('cart'))
        {
        return Product::with('images')->findMany(array_keys(Session::get('cart')));
        }
    }


    //calculate total cost of all products in cart
    public static function cost()
    {
        if (Session::get('cart'))
        {
            $items = Session::get('cart');

            $products = Product::findMany(array_keys(Session::get('cart')));

            $total = 0;
            
            foreach ($products as $product)
            {
                $amount = $items[$product->id];
                
                if ($product->price_discount)
                {
                    $total += $product->price * $amount;
                }
                else
                {
                    $total += $product->price * $amount;
                }
            };

            return $total;
        };

        return null;
    }
}