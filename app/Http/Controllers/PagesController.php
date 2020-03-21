<?php

namespace App\Http\Controllers;

use App\Market;
use App\MarketPrice;
use App\Product;

class PagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index()
    {
        $products = Product::all();

        return view('welcome')->with('products', $products);
    }

    public function allmarket()
    {
        $markets = Market::all();

        return view('admin.all-market')->with('markets', $markets);
    }

    public function allproduct()
    {
        $products = Product::all();

        return view('admin.all-products')->with('products', $products);
    }

    public function allprice()
    {
        $prices = MarketPrice::all();

        return view('admin.all-market-price')->with('prices', $prices);
    }

}
