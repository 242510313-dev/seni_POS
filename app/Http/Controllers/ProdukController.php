<?php

namespace App\Http\Controllers;

use App\Http\Requests\Produk\StoreRequest;
use App\Http\Requests\Produk\UpdateRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Jenis;
use App\Models\Produk;
use App\Models\ItemPenjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SearchRequest $request)
    {
      $keyword = $request->input('search');

      if ($keyword) {
    $products = Produk::with(['user', 'jenis'])
        ->when($keyword, function ($query) use ($keyword) {
            $query->where('nama', 'like', '%' . $keyword . '%');
        })
        ->orderBy('nama')
        ->paginate(10)
        ->withQueryString();
} else {
    $products = Produk::with(['user', 'jenis'])->latest()->paginate(10)->withQueryString();
}
 return view('produk.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis = Jenis::orderBy('nama_jenis')->get();

        return view('produk.create', compact('jenis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
          $dataReq = $request->validated();

$data['user_id'] = Auth::id();
$data['jenis_id'] = $dataReq['jenis_id'];
$data['nama'] = $dataReq['name'];
$data['harga_beli'] = $dataReq['purchase_price'];
$data['harga_jual'] = $dataReq['selling_price'];
$data['stok'] = $dataReq['stock'] ?? true;

if ($request->hasFile('foto')) {
    $data['foto'] = $request->file('foto')->store('products', 'public');
}

Produk::create($data);

return redirect()->route('produk.index')
->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
{
    $jenis = Jenis::orderBy('nama_jenis')->get();

    return view('produk.edit', compact('produk', 'jenis'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Produk $produk)
{
    $dataReq = $request->validated();

    $data = [
        'user_id' => Auth::id(),
        'jenis_id' => $dataReq['jenis_id'],
        'nama' => $dataReq['name'],
        'harga_beli' => $dataReq['purchase_price'],
        'harga_jual' => $dataReq['selling_price'],
        'stok' => $dataReq['stock'] ?? 0,
    ];

    if ($request->hasFile('foto')) {

        if (
            $produk->foto &&
            Storage::disk('public')->exists($produk->foto)
        ) {
            Storage::disk('public')->delete($produk->foto);
        }

        $data['foto'] = $request->file('foto')
            ->store('products', 'public');
    }

    $produk->update($data);

    return redirect()->route('produk.index')
        ->with('success', 'Product updated successfully.');
}


/**
 * Remove the specified resource from storage.
 */
public function destroy(Produk $produk)
{
    if ($produk->itemPenjualan()->exists()) {
        return redirect()
            ->route('produk.index')
            ->with('errors', 'Produk tidak dapat dihapus karena sudah digunakan dalam transaksi.');
    }

    if (
        $produk->foto &&
        Storage::disk('public')->exists($produk->foto)
    ) {
        Storage::disk('public')->delete($produk->foto);
    }

    $produk->delete();

    return redirect()
        ->route('produk.index')
        ->with('success', 'Produk berhasil dihapus.');
}
}