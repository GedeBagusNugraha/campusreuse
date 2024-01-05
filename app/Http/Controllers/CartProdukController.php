<?php

namespace App\Http\Controllers;
use App\Models\Produks;
use App\Models\Carts;
use Illuminate\Http\Request;

class CartProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cart = Carts::with('rates')->get();;
        return view('frontend.cartProduk', compact('cart'));
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
    public function destroy($cart1)
    {
        try {
            $cart = Carts::find($id);
    
            if ($cart) {
                $cart->delete();
    
                // Berikan respons JSON yang menyatakan penghapusan berhasil
                return response()->json(['success' => true]);
            } else {
                // Jika ID tidak ditemukan, berikan respons JSON yang menyatakan kegagalan penghapusan
                return response()->json(['success' => false, 'message' => 'Cart not found']);
            }
        } catch (\Throwable $e) {
            // Jika terjadi kesalahan lain, berikan respons JSON dengan informasi kesalahan
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Menambahkan produk ke dalam keranjang.
     *
     * @param  int  $productId
     * @return \Illuminate\Http\Response
     */
    public function addToCart($id)
    {
        $produk = Produks::findOrFail($id);
        $harga = $produk->rates->first();
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['jumlah']++;
        } else {
            $cart[$id] = [
                "foto_produk" => $produk->foto_produk,
                "nama_produk" => $produk->nama_produk,
                "jumlah" => 1,
                "nama_rate" => $harga ? $harga->nama_rate : 0
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produk sudah ditambahkan kedalam keranjang');
        
    }
        //$produk = Produks::with('rates')->findOrFail($id);
        //$harga = $produk->rates->first();
        //$cart = Carts::where('id_produk', $id)->first();
//
        //if($cart) {
        //    $cart->jumlah++;
        //} else {
        //    $cart = new Carts([
        //        "id_produk" => $id,
        //        "id_rate" => $harga,
        //        "jumlah" => 1,
        //        "total_harga" => null
        //    ]);
        //}
//
        //$cart->save(); // Menyimpan atau memperbarui record di database
    //
        //return redirect()->back()->with('success', 'Produk sudah ditambahkan ke dalam keranjang');
    
        //$produk = Produks::with('rates')->findOrFail($id);
        //$harga = $produk->rates->first();
        //$cart = session()->get('cart', []);
        //if(isset($cart[$id])) {
        //    $cart[$id]['jumlah']++;
        //} else {
        //    $cart[$id] = [
        //        "foto_produk" => $produk->foto_produk,
        //        "nama_produk" => $produk->nama_produk,
        //        "jumlah" => 1,
        //        "nama_rate" => $harga ? $harga->nama_rate : 0
        //    ];
        //}
        //session()->put('cart', $cart);
        //return redirect()->back()->with('success', 'Produk sudah ditambahkan kedalam keranjang');
        
        //$product = Produks::all();
//
        //// Validasi jumlah minimal 1
        //$request->validate([
        //    'jumlah' => 'required|integer|min:1',
        //]);
//
        //// Cek apakah produk sudah ada di keranjang user
        //$cartItem = Carts::where('id_produk', $product->id_produk)->first();
//
        //if ($cartItem) {
        //    // Jika produk sudah ada, tambahkan jumlahnya
        //    $cartItem->increment('jumlah', $request->input('jumlah'));
        //} else {
        //    // Jika produk belum ada, buat item baru di keranjang
        //    $rate = $product->rates; // Asumsi relasi antara Produk dan Rate didefinisikan sebagai 'rate'
//
        //    Carts::create([
        //        'id_produk' => $product->id_produk,
        //        'jumlah' => 1,
        //        'total_harga' => $rate ? $rate->nama_rate : $product->rates->nama_rate, // Gunakan nama_rate jika ada, jika tidak, gunakan harga produk
        //        // Tambahkan field lain yang mungkin diperlukan
        //    ]);
        //}
//
        //return redirect()->route('cart.index')->with('success', 'Produk ditambahkan ke keranjang.');
    
}
