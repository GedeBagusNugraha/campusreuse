<?php

namespace App\Http\Controllers;
use App\Models\Produks;
use App\Models\Rates;
use App\Models\Kategoris;
use Illuminate\Http\Request;

class ProdukHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data1 = Produks::where('id_kategori', 1)->with('rates')->paginate(4);
        $data2 = Produks::where('id_kategori', 2)->with('rates')->paginate(4);
        $data = $data1->union($data2)->all();
        return view('frontend.homeProduk', compact('data1', 'data2', 'data'));
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
        $data = Produks::findOrFail($id);
        $kategori = Kategoris::find($data->id_kategori); // Menggunakan id_kategori dari produk
        $harga = Rates::where('id_produk', $id)->first(); // Mendapatkan harga berdasarkan id_produk

    return view('frontend.detailProduk', compact('data', 'kategori', 'harga'));
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
