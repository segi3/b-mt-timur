<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

        \App\Models\User::factory()->create([
            'no_id_user' => '14045',
            'name' =>'rafi nizar',
            'email' => 'rafi@email.com',
            'password' => Hash::make('12345678'),
            'role' => 'supervisor',
        ]);

        \App\Models\User::factory()->create([
            'no_id_user' => '111333',
            'name' =>'aaadi',
            'email' => 'aaad@email.com',
            'password' => Hash::make('12345678'),
            'role' => 'teknisi',
        ]);

        // energi
        DB::table('konsumsi_energi')->insert([
            'konsumsi_listrik' => 100,
            'konsumsi_air' =>200,
            'konsumsi_gas' =>300,
            'tanggal' => Carbon::now()->format('Y-m-d')
        ]);

        DB::table('konsumsi_energi')->insert([
            'konsumsi_listrik' => 50,
            'konsumsi_air' =>150,
            'konsumsi_gas' =>450,
            'tanggal' => Carbon::yesterday()->format('Y-m-d')
        ]);

        // utilitas
        DB::table('utilitas')->insert([
            'no_util' => '134423',
            'tanggal' => Carbon::now()->format('Y-m-d'),
            'jenis_utilitas' => 'air_conditioning',
            'lokasi_utilitas' => 'Lantai 1',
            'status_utilitas' => 'Siap Pakai',
            'keterangan' => 'Suhu dalam keadaan stabil',
        ]);
        DB::table('utilitas')->insert(
            [
                'no_util' => '123333',
                'tanggal' => Carbon::now()->format('Y-m-d'),
                'jenis_utilitas' => 'air_conditioning',
                'lokasi_utilitas' => 'Lantai 2',
                'status_utilitas' => 'Siap Pakai',
                'keterangan' => 'Suhu dalam keadaan stabil kayaknya',
            ],
        );
        DB::table('utilitas')->insert([
            'no_util' => '776575',
            'tanggal' => Carbon::now()->format('Y-m-d'),
            'jenis_utilitas' => 'lampu',
            'lokasi_utilitas' => 'Lantai 1',
            'status_utilitas' => 'Dalam Perbaikan',
            'keterangan' => 'Lampu redup',
        ]);

        // komplain
        DB::table('komplain')->insert([
            'tgl_penyampaian' =>  Carbon::now(),
            'bidang_pekerjaan' => 'MEKANIKAL',
            'uraian_pekerjaan' => 'Pompa transfer di basement panas dan air tidak mau keluar',
            'status_pekerjaan' => 'Waiting',
            'nama_pelapor' => 'Timur',
            'user_id' => null,
            'nama_teknisi' => '-'
        ]);
    }
}
