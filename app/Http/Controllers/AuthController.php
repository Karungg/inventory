<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Invalid input',
                'errors' => $validator->errors()
            ], 401);
        }

        // Cek apakah email ada di database
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            // Jika user tidak ditemukan atau password salah
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        // Jika login berhasil, kembalikan data user
        return response()->json([
            'is_active' => true,
            'message' => 'Login successful',
            'data' => [
                'id' => '1',
                'nama' => $user->nama,
                'profesi' => $user->profesi,
                'email' => $user->email,
                'role_id' => '1',
                'is_active' => '1',
                'tanggal_input' => now()->toDateTimeString(),
                'modified' => now()->toDateTimeString(),
            ]
        ]);
    }

    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'profesi' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Invalid input',
                'errors' => $validator->errors()
            ], 422);
        }

        User::create([
            'nama' => $request->input('nama'),
            'profesi' => $request->input('profesi'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Jika login berhasil, kembalikan data user
        return response()->json([
            'message' => 'Register successful'
        ]);
    }
}
