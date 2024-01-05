<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Produks;
use App\Models\Kategoris;
use App\Models\Rates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;

class ProdukAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produks::with('kategoris', 'rates', 'carts')->get();
        return response()->json($produk);
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
        $validasi = $request->validate([
            'foto_produk' => 'required|file|mimes:png,jpg',
            'nama_produk' => 'required',
            'desc_produk' => 'required',
            'id_kategori' => 'required',
            'id_diskon' => 'nullable',
            'nama_rate' => 'required',
        ]);

        try {
            $filename = time().$request->file('foto_produk')->getClientOriginalName();
            $path = $request->file('foto_produk')->storeAs('photo', $filename);
            $validasi['foto_produk']=$path;
            $response = Produks::create($validasi);
            $id_produk = $response->id_produk;
            $rate = Rates::create([
                'id_produk' => $id_produk,
                'nama_rate' => $request->input('nama_rate'),
            ]);
            return response()->json([
                'success' => true,
                'message' => 'success',
                'produk' => $response,
                'rate' => $rate,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Err',
                'errors' => array(
                    'file' =>[$e -> getMessage()]
                )
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produk = Produks::with('kategoris', 'rates', 'carts')->find($id);

        if (!$produk) {
            return response()->json(['message' => 'Produk not found'], 404);
        }

        return response()->json(['data' => $produk], 200);
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
        $validasi = $request->validate([
            'foto_produk' => 'required|file|mimes:png,jpg',
            'nama_produk' => 'required',
            'desc_produk' => 'required',
            'id_kategori' => 'required',
            'id_diskon' => 'nullable',
            'nama_rate' => 'required',
        ]);

        try {
            if($request->file('foto_produk')){
                $filename = time().$request->file('foto_produk')->getClientOriginalName();
                $path = $request->file('foto_produk')->storeAs('photo', $filename);
                $validasi['foto_produk']=$path;
            }
            $response = Produks::find($id);
            $response->update($validasi);
            $rate = Rates::where('id_produk', $id)->first();
            $rate->update($validasi);
            return response()->json([
                'success' => true,
                'message' => 'success',
                'produk' => $response,
                'rate' => $rate,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Err',
                'errors' => array(
                    'file' =>[$e -> getMessage()]
                )
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produks::find($id);

        if (!$produk) {
            return response()->json(['message' => 'Produk not found'], 404);
        }

        $produk->delete();

        return response()->json(['message' => 'Produk deleted successfully'], 200);
    }
}
