<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'nama' => 'Alaaddin Ali Ahmed Al-Gerafi',
            'npm' => '2217051164',
            'kelas_id' => 1,
            'foto' => 'john_doe.jpg',
            'jurusan' => 'Teknik Informatika',
            'semester' => 5
        ]);
}

}
