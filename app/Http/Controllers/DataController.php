<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DataController extends Controller
{
    public function data()
    {
        $data = DB::table('users')->get();
        return view('data.data', compact('data'));
    }

    public function add()
    {
        return view('data.add');
    }

    public function addProcess(Request $request)
    {
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('data')->with('status', 'Akun Berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = DB::table('users')->where('id', $id)->first();
        return view('data.edit', compact('data'));
    }

    public function editProcess(Request $request, $id)
    {
        DB::table('users')->where('id', $id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

        return redirect('data')->with('status', 'Akun Berhasil diupdate!');
    }

    public function delete($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect('data')->with('status', 'Akun Berhasil dihapus!');
    }
}
