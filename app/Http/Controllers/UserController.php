<?php

namespace App\Http\Controllers;

use App\Http\Requests\userRequest;
use App\Models\Kelas;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    // Display the profile
    public function profile($nama = "", $kelas = "", $npm = "")
    {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm
        ];

        return view('profile', $data);
    }

    // Create method
    public function create()
    {
        // Access the kelasModel property using $this
        $kelas = $this->kelasModel->getKelas();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];

        return view('create_user', $data);
    }

    // Store method to save user data
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'foto' =>
            'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //Validasi untuk foto
            ]);
            // Meng-handle upload foto
            if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            // Menyimpan file foto di folder 'uploads'
            $fotoPath = $foto->move(('upload/img'), $foto);
            } else {
            // Jika tidak ada file yang diupload, set fotoPath menjadi null atau default
            $fotoPath = null;
            }
            // Menyimpan data ke database termasuk path foto
            $this->userModel->create([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
            'foto' => $fotoPath, // Menyimpan path foto
            ]);
            return redirect()->to('/user')->with('success', 'User berhasil ditambahkan');
    }

    public function index()
    {
        // $kelas = Kelas::find(1);
        // $user = $kelas->user();'

        // dd($user);

        // Fetch all users with their class information
        $users = $this->userModel->getUser();
        $data = [
            'title' => 'Create User',
            'kelas' => $this->userModel->getUser(), // Fetch the user list with class data
        ];
        return view('list_user', $data);

        return view('list_user', ['users' => $users]);
    }

    public function show($id)
{
    $user = $this->userModel->getUser($id);

    $data=[
        'title'=>'Profile',
        'user'=>$user,
    ];

    return view('profile', $data);
}

}
