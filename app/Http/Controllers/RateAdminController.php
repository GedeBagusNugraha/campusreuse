<?php

namespace App\Http\Controllers;
use App\Models\Produks;
use App\Models\Kategoris;
use App\Models\Rates;
use Illuminate\Http\Request;

class RateAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Produks::all();
        $kategori = Kategoris::all();
        $harga = Rates::all();
        return view('backend.adminHarga', compact('data', 'kategori', 'harga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Input Page';
        $data = Produks::all();
        return view('backend.inputHarga', compact('title', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi=$request->validate([
            'nama_rate' => 'required',
            'id_produk' => 'required'     
        ]);
        try {
            $response = Produks::create($validasi);
            $response = Rates::create($validasi);
            return redirect('rate');
        } catch (\Exception $e) {
            echo $e->getMessage();
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
        $title = 'Input Page';
        $data = Produks::all();
        $harga = Rates::find($id);
        return view('backend.inputHarga', compact('title', 'harga', 'data'));
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
            'nama_rate' => 'required',
            'id_produk' => 'required'
        ]);
        try {
            $response = Rates::find($id)->update($validasi);
            return redirect('rate');
        } catch (\Exception $e) {
            echo $e->getMessage();
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
        try {
            //$package = Packages::where('package_id', $id);
            $harga = Rates::find($id);
            $harga->delete();
            return redirect('rate');
        } catch (\Throwable $e) {
            echo $e->getMessage();
        }
    }
}
