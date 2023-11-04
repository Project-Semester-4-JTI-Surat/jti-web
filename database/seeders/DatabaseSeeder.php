<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Dosen;
use App\Models\JenisSurat;
use App\Models\Koordinator;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\Role;
use App\Models\Status;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Role::create(
        //     [
        //         'keterangan'=>'Super Admin'

        //     ]
        // );
         Admin::create(
             [
                 'username'=>'adminjti2',
                 'nama'=>'Indriana Rahmawati',
                 'prodi_id'=>1,
                 'role_id'=>1,
                 'no_hp'=>'6208122255966',
                 'password'=>'12345678'
             ]
             );
//         Admin::create(
//             [
//                 'username'=>'super2',
//                 'nama'=>'SuperAdmin2',
//                 'prodi_id'=>2,
//                 'role_id'=>2,
//                 'no_hp'=>'6208122255966',
//                 'password'=>'12345678'
//             ]
//             );
        // Prodi::create(
        //     [
        //         'keterangan' => 'MIF Inter'
        //     ]
        //     );
        // Mahasiswa::create(
        //     [
        //         'nim'=>'E41210759',
        //         'nama'=>'Muhammad Adi Saputro',
        //         'email'=>'muhammadxx7@gmail.com',
        //         'prodi_id'=>1,
        //         'password'=>bcrypt('12345'),
        //         'alamat'=>'Tanggul Jember',
        //         'no_hp'=>'085748314069',
        //         'tanggal_lahir'=>'2003-05-21'
        //     ]
        //     );
        // Dosen::create(
        //     [
        //         'nip'=>'199408122019031013',
        //         'nama'=>'Mukhamad Angga Gumilang, S. Pd., M. Eng.',
        //         'prodi_id'=>1,
        //         'email'=>'angga.gumilang@polije.ac.id',
        //     ]
        //     );
        // JenisSurat::create(
        //     [
        //         'kode'=>'TA',
        //         'keterangan'=>'Tugas Akhir'
        //     ]
        //     );
        // Koordinator::create(
        //     [
        //         'nama'=>'M. Angga Gumilang, S. Pd., M. Eng.',
        //         'no_hp'=>'085156168675',
        //         'email'=>'angga.gumilang@polije.ac.id',
        //         'prodi_id'=>'1',
        //         'kode_surat'=>'TA'
        //     ]
        //     );
        // Role::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Status::create(
        //     [
        //         'info' => 'gagal',
        //         'keterangan'=>'Ditolak'
        //     ]
        // );
    }
}
