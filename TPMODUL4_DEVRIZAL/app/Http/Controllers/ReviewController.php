<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating'     => 'required|integer|min:1|max:5',
            'comment'    => 'nullable|string|max:1000',
        ]);

        $product = Product::findOrFail($request->product_id);

        // 1. Simpan review baru ke dalam tabel reviews
        $review = new Review([
            'product_id' => $product->id,  
            'rating'     => $request->rating,
            'comment'    => $request->comment,
            'user_id'  => auth()->id(),
        ]);

        // simpan via relasi
        $product->reviews()->save($review);

        session()->flash('success', 'Review berhasil ditambahkan!');
        return redirect()->route('products.show', $product->id);
    }

    public function update(Request $request, string $id)
    {
        // not used
    }

    public function destroy(string $id)
    {
        // 2. Cari review berdasarkan id
        $review = Review::findOrFail($id);

        $productId = $review->product_id;

        // 3. Hapus review
        $review->delete();

        session()->flash('success', 'Review berhasil dihapus!');
        return redirect()->route('products.show', ['product' => $productId]);
    }
}
