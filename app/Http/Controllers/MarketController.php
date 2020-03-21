<?php

namespace App\Http\Controllers;

use App\Market;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MarketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-market');
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
            'address'       =>  'required',
        ]);

        $market = new Market();

        $market->name = request('name');
        $market->address = request('address');

        $market->save();

        Session::flash('success', 'Created successfully!');
        return redirect()->route('market');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($market)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $market = Market::find($id);

        return view('market.edit')->with('market', $market);
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
        $market = Market::find($id);

        $this->validate($request, [
            'name'          =>  'required|string',
            'address'       =>  'required',
        ]);

        $market->name = request('name');
        $market->address = request('address');

        $market->save();

        Session::flash('success', 'Updated successfully!');
        return redirect()->route('market');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $market = Market::find($id)->delete();

        Session::flash('success', 'Deleted successfully');
        return redirect()->route('market');
    }
}
