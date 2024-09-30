<?php

namespace App\Http\Controllers;

use App\Http\Requests\userRequest;
use App\Models\Kelas;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function profile($nama = "", $kelas = "", $npm = "")
    {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm
        ];
        return view('profile', $data);
    }
    public function create()
    {
        return view('create_user',[
            'kelas'=> Kelas::all(),
        ]);
    }

    public function store(userRequest $request)
    {
        // $data = $request->all();
        // $data = [
        //     'nama' => $request->input('nama'),
        //     'kelas' => $request->input('kelas'),
        //     'npm' => $request->input('npm'),
        //     ];
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
        ]);
            $user = UserModel::create($validatedData);

            $user-> load('kelas');


            return view('profile', [
                'nama' => $user->nama,
            'npm' => $user->npm,
            'nama_kelas' => $user->kelas->nama_kelas ?? 'kelas tidak ditemukan',
            ]);

    }
}
