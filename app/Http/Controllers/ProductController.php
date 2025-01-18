<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        try {
            $products = Product::orderBy('created_at', 'asc')->get();

            return response()->json([
                'message' => 'Success',
                'data' => $products
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to load data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Product::create([
                'nama_barang' => $request->input('nama_barang'),
                'stok' => $request->input('stok'),
                'harga' => $request->input('harga'),
            ]);

            return response()->json([
                'message' => 'success',
                'data' => [
                    $request->all()
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'error',
                'data' => [
                    $e->getMessage()
                ]
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $products = Product::where('id', $id)->get();

            return response()->json([
                'message' => 'Success',
                'data' => $products
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to load data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $Product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            Product::where('id', $id)
                ->update([
                    'nama_barang' => $request->input('nama_barang'),
                    'stok' => $request->input('stok'),
                    'harga' => $request->input('harga'),
                ]);

            return response()->json([
                'message' => 'success',
                'data' => [
                    $request->all()
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'error',
                'data' => [
                    $e->getMessage(),
                    $request->all()
                ]
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Product $Product)
    {
        try {
            Product::where('id', $id)
                ->delete();

            return response()->json([
                'message' => 'success',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'error',
                'data' => [
                    $e->getMessage(),
                ]
            ]);
        }
    }
}
