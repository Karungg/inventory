<?php

namespace App\Http\Controllers;

use App\Models\ReturnProduct;
use Illuminate\Http\Request;

class ReturnProductController extends Controller
{
    public function index()
    {
        try {
            $products = ReturnProduct::orderBy('created_at', 'asc')->get();

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
            ReturnProduct::create([
                'nama_barang' => $request->input('nama_barang'),
                'nama_retur' => $request->input('nama_retur'),
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
            $products = ReturnProduct::where('id', $id)->get();

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
    public function edit(ReturnProduct $Product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            ReturnProduct::where('id', $id)
                ->update([
                    'nama_barang' => $request->input('nama_barang'),
                    'nama_retur' => $request->input('nama_retur'),
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
    public function destroy($id, ReturnProduct $Product)
    {
        try {
            ReturnProduct::where('id', $id)
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
