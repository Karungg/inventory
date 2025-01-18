<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($id)
    {
        try {
            $user = User::where('nama', 'saqi')
                ->select(['id', 'nama', 'profesi', 'email', 'password'])
                ->get();

            return response()->json([
                'is_active' => true,
                'message' => 'Success',
                'data' => $user
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to load data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function updateUser(Request $request, $id)
    {
        try {
            User::where('id', $id)
                ->update([
                    'nama' => $request->input('nama'),
                    'profesi' => $request->input('profesi'),
                    'email' => $request->input('email'),
                    'password' => bcrypt($request->input('password'))
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
                ]
            ]);
        }
    }
}
