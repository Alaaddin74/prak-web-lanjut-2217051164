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
        // Validate the request data before saving
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $this->userModel->create([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
            ]);

        // Create the new user record
        // $this->userModel->create([
        //     'nama' => $validatedData['nama'],
        //     'npm' => $validatedData['npm'],
        //     'kelas_id' => $validatedData['kelas_id'],
        // ]);

        // Redirect to the list of users after saving
        return redirect()->to('/users');
    }

    public function index()
    {
        // $kelas = Kelas::find(1);
        // $user = $kelas->user();

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
}
