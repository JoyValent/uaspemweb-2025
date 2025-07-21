<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        return response()->json(Buku::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
        ]);

        $buku = Buku::create($validated);
        return response()->json($buku, 201);
    }

    public function show($id)
    {
        $buku = Buku::find($id);
        if (!$buku) {
            return response()->json(['message' => 'Buku not found'], 404);
        }
        return response()->json($buku);
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::find($id);
        if (!$buku) {
            return response()->json(['message' => 'Buku not found'], 404);
        }

        $validated = $request->validate([
            'judul' => 'sometimes|required|string|max:255',
            'penulis' => 'sometimes|required|string|max:255',
            'stok' => 'sometimes|required|integer|min:0',
        ]);

        $buku->update($validated);
        return response()->json($buku);
    }

    public function destroy($id)
    {
        $buku = Buku::find($id);
        if (!$buku) {
            return response()->json(['message' => 'Buku not found'], 404);
        }

        $buku->delete();
        return response()->json(['message' => 'Buku deleted']);
    }
}
