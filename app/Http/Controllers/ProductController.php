<?php

namespace App\Http\Controllers;

use App\MarketPrice;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    public function index()
    {
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-product');
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
            'name'          =>  'required|string',
            'description'   =>  'required',
            'image.*'       =>  'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = new Product();

        $product->name = request('name');
        $product->description = request('description');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('img/product/'.$filename);
            Image::make($image)->resize(800, 400)->save($location);

            $product->image = $filename;
        }

        $product->save();

        Session::flash('success', 'Product created successfully!');
        return redirect()->route('admin.product');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->firstOrFail();
        $prices = MarketPrice::where('product_id', $product->id)->get();

        return view('product.single')->with('product', $product)->with('prices', $prices);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('product.edit')->with('product', $product);
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
        $product = Product::find($id);

        $this->validate($request, [
            'name'          =>  'required|string',
            'description'   =>  'required',
            'image.*'       =>  'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product->name = request('name');
        $product->description = request('description');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('img/product/'.$filename);
            Image::make($image)->resize(800, 400)->save($location);
            $oldFileName = $product->image;

            Storage::delete($oldFileName);

            $product->image = $filename;
        }

        $product->save();

        Session::flash('success', 'Product updated successfully!');
        return redirect()->route('admin.product');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id)->delete();

        Session::flash('success', 'Product deleted successfully');
        return redirect()->route('product');
    }
}
