<?php

namespace App\Http\Controllers\API\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function create(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|max:25',
            'role' => 'required'
        ]);
        try {
            DB::transaction(function() use ($request){
               User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => $request->password,
                    'role' => $request->role
                ]);
    
            });
            DB::commit();
            return response()->json([
                "message" => 'Data berhasil di Inputkan',
               
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return response()->json([
            "User" => $user
        ]);
    }
    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',    
            'role' => 'required'
        ]);
        try {
            DB::transaction(function() use ($request, $user){
            $user->update([
                "name" => $request->name,
                "email" => $request->email,
                "role" => $request->role,
            ]);
            });
            DB::commit();
            return response()->json([
                'message' => 'Update Berhasil',
                'update' => $user
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }

    public function delete($id) 
    {
        try {
            DB::transaction(function() use($id){
                $user = User::findOrFail($id)->delete();
            });
            DB::commit();
            return response()->json([
                'message' => 'Berhasil dihapus'
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
        }

    }


}
