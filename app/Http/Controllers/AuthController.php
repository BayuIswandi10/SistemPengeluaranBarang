<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    public function login(Request $request)
    {
        Session::flash('nrp_karyawan', $request->Username);
    
        $request->validate([
            'Username' => 'required',
            'Password' => 'required'
        ], [
            'Username.required' => 'Username wajib diisi.',
            'Password.required' => 'Password wajib diisi.'
        ]);
    
        $username = $request->get('Username');
        $password = $request->get('Password');
    
        // Cari user berdasarkan username
        $user = User::where('nrp_karyawan', $username)->first();
    
        if ($user) {
            // Check if the password matches
            if ($user->password == $password) {
    
                    return redirect(route('dashboard.index'))->with('success', 'Login Berhasil!');

            } else {
                // Password tidak sesuai
                return redirect(route('logins.index'))->with('error', 'Password salah!');
            }
        } else {
            // Autentikasi gagal
            return redirect(route('logins.index'))->with('error', 'Username tidak ditemukan!');
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
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
