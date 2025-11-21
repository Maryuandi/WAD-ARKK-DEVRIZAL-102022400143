<?php

namespace App\Http\Controllers;

use App\Models\Kucing;
use Illuminate\Http\Request;

class KucingController extends Controller
{
    // Menampilkan daftar semua kucing
    public function index()
    {
        $kucings = Kucing::all();   // ambil semua data

        return view('DaftarKucing', compact('kucings'));
    }

    // Menampilkan detail satu kucing berdasarkan id
    public function show($id)
    {
        $kucing = Kucing::findOrFail($id);

        return view('DetailKucing', compact('kucing'));
    }
}
