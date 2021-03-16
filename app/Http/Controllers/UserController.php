<?php

namespace App\Http\Controllers;

// use Illuminate\Foundation\Auth\User;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('account.index', compact('user'));
    }

    public function delete($id) 
    {
        $user = User::destroy($id);
        return redirect()->back();
    }
    public function store(Request $data)
    {
        try {
            DB::transaction(function() use ($data) {
                User::create([
                       'name' => $data->name,
                       'email' => $data->email,
                       'password' => Hash::make($data->password),
                       'role' => $data->role,
                   ]);
            });
            DB::commit();
            return redirect('user')->with('status', 'Tambah Akun Berhasil');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('status', 'Tambah Akun Gagal');

            //throw $th;
        }
    }

    // protected function tampil() 
    // {
    //     $name = User::all();

    // }

    
}
