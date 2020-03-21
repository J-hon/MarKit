<?php

namespace App\Http\Controllers;

use App\Market;
use App\MarketPrice;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MarketPriceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $markets = Market::all();

        return view('admin.add-market-price')->with('markets', $markets)->with('products', $products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'market_id'     =>  'required|integer',
            'product_id'    =>  'required|integer',
            'price'         =>  'required|regex:/^\d+(\.\d{0,2})?$/',
        ]);

        $status = MarketPrice::where('market_id', $request->market_id)
            ->where('product_id', $request->product_id)
            ->first();

        if (isset($status->market_id) and isset($request->product_id))
        {
            Session::flash('unsuccessful', 'Price already exists.');
            return redirect()->route('price');
        }

        $marketPrice = new MarketPrice();

        $marketPrice->price = request('price');
        $marketPrice->market_id = request('market_id');
        $marketPrice->product_id = request('product_id');

        $marketPrice->save();

        Session::flash('success', 'Successful!');
        return redirect()->route('price');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $price = MarketPrice::find($id);
        $products = Product::all();
        $markets = Market::all();

        return view('price.edit')->with('price', $price)->with('products', $products)->with('markets', $markets);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $price = MarketPrice::find($id);

//        $status = MarketPrice::where('market_id', $price->market_id)
//            ->where('product_id', $price->product_id)
//            ->first();
//
//        if (isset($status->market_id) and isset($status->product_id) and isset($status->price))
//        {
//            Session::flash('unsuccessful', 'No changes made.');
//            return redirect()->route('price');
//        }

        $this->validate($request, [
            'market_id'     =>  'required|integer',
            'product_id'    =>  'required|integer',
            'price'         =>  'required|regex:/^\d+(\.\d{0,2})?$/',
        ]);

        $price->market_id = request('market_id');
        $price->product_id = request('product_id');
        $price->price = request('price');

        $price->save();

        Session::flash('success', 'Successful!');
        return redirect()->route('price');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $price = MarketPrice::find($id)->delete();

        Session::flash('success', 'Price deleted successfully');
        return redirect()->route('price');
    }
}
