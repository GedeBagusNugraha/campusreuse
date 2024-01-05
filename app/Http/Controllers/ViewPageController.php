<?php

namespace App\Http\Controllers;
use App\Models\Produks;
use App\Models\Kategoris;
use Illuminate\Http\Request;

class ViewPageController extends Controller
{
    public function viewmore2()
    {
        $data1 = Produks::where('id_kategori', 1)->with('rates')->get();
        $data2 = Produks::where('id_kategori', 2)->with('rates')->get();
        $data = $data1->union($data2);
        $kategori = Kategoris::all();
        return view('frontend.viewmore2', compact('data1', 'data2', 'data', 'kategori'));
    }

    /*public function cart()
    {
        $data = Produks::with('rates')->get();
        return view('frontend.cartProduk', compact('data'));
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data1 = Produks::where('id_kategori', 1)->with('rates')->get();
        $data2 = Produks::where('id_kategori', 2)->with('rates')->get();
        $data = $data1->union($data2);
        $kategori = Kategoris::all();
        return view('frontend.viewmore', compact('data1', 'data2', 'data', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
