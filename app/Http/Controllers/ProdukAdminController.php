<?php

namespace App\Http\Controllers;
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
        $data = Produks::paginate(10);
        $kategori = Kategoris::all();
        $harga = Rates::all();
        return view('backend.adminProduk', compact('data', 'kategori', 'harga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Input Page';
        $kategori = Kategoris::all();
        return view('backend.inputProduk', compact('title', 'kategori'));
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
            'nama_produk' => 'required',
            'desc_produk' => 'required',
            'foto_produk' => 'required',
            'id_kategori' => 'required',  
            'nama_rate' => 'required'        
        ]);

        $validasi['nama_rate'] = preg_replace('/[^0-9]/', '', $validasi['nama_rate']);

        try {
            //$validasi['desc_produk'] = strip_tags($validasi['desc_produk']);
            //$validasi['desc_produk'] = htmlspecialchars_decode($validasi['desc_produk']);

            $fileName = time() . $request->file('foto_produk')->getClientOriginalName();

            $path = $request->file('foto_produk')->storeAs('photo',$fileName);

            $validasi['foto_produk'] = $path;

            $response = Produks::create($validasi);
            $id_produk = $response->id_produk;

            Rates::create([
                'id_produk' => $id_produk,
                'nama_rate' => $validasi['nama_rate'],
            ]);
            return redirect('admin');
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
        $kategori = Kategoris::all();
        $data = Produks::with('rates')->find($id);
        return view('backend.inputProduk', compact('title', 'kategori', 'data'));
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
            'nama_produk' => 'required',
            'desc_produk' => 'required',
            'id_kategori' => 'required', 
            'nama_rate' => 'required'
        ]);

        $validasi['nama_rate'] = preg_replace('/[^0-9]/', '', $validasi['nama_rate']);

        try {
            //$validasi['desc_produk'] = strip_tags($validasi['desc_produk']);
            //$validasi['desc_produk'] = htmlspecialchars_decode($validasi['desc_produk']);

            $response = Produks::find($id);

            // Jika file baru diupload, update foto_produk
            if ($request->hasFile('foto_produk')) {
                // Hapus file lama
                Storage::delete($response->foto_produk);

                $fileName = time() . $request->file('foto_produk')->getClientOriginalName();
                $path = $request->file('foto_produk')->storeAs('photo', $fileName);
                $validasi['foto_produk'] = $path;
            } else {
                // Jika tidak, gunakan file lama
                $validasi['foto_produk'] = $response->foto_produk;
            }

            $descProduk = new HtmlString($validasi['desc_produk']);

            // Update data Produk
            $response->update($validasi);

            // Update data Rates
            $response->rates->first()->update([
                'nama_rate' => $validasi['nama_rate']
            ]);

            return redirect('admin');
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
            $data = Produks::find($id);
            
            // Hapus file terkait dari penyimpanan
            Storage::delete($data->foto_produk);

            $data->delete();

            return redirect('admin');
        } catch (\Throwable $e) {
            echo $e->getMessage();
        }
    }
}
