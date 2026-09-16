<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisController extends Controller
{
    public function index()
    {
        $jenis = Jenis::all();
        return view('jenis.index', compact('jenis'));
    }

    // Fungsi untuk menyimpan data jenis produk baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis' => 'required|string|max:255',
        ]);

        Jenis::create([
            'nama_jenis' => $request->nama_jenis,
        ]);

        return redirect()->route('jenis.index')->with('success', 'Jenis produk berhasil ditambahkan!');
    }

    public function update(Request $request, Jenis $jenis)
    {
        $validated = $request->validate([
            'nama_jenis' => 'required|string|max:255',
        ]);

        DB::table('jenis')
            ->where('id', $jenis->id)
            ->update([
                'nama_jenis' => $validated['nama_jenis'],
                'updated_at' => now(),
            ]);

        $jenis->refresh();

        return redirect()
            ->route('jenis.index')
            ->with('success', 'Jenis produk berhasil diperbarui!');
    }

    public function destroy(Jenis $jenis)
    {
        if ($jenis->produk()->exists()) {
            return redirect()
                ->route('jenis.index')
                ->with('error_message', 'Jenis tidak dapat dihapus karena masih digunakan oleh produk.');
        }

        $deleted = Jenis::whereKey($jenis->getKey())->delete();

        if ($deleted === 0) {
            return redirect()
                ->route('jenis.index')
                ->with('error_message', 'Jenis tidak ditemukan atau sudah dihapus.');
        }

        return redirect()
            ->route('jenis.index')
            ->with('success', 'Jenis produk berhasil dihapus!');
    }
}