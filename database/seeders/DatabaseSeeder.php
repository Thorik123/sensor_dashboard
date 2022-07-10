<?php

namespace Database\Seeders;

use App\Models\Device;
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
        Device::create([
            'nama' => 'Lampu Kamar',
            'deskripsi' => 'Lampu pada ruangan kamar',
            'status' => 'Active',
            'user_id' => '1'
        ]);
        Device::create([
            'nama' => 'Televisi',
            'deskripsi' => 'Lampu pada Taman',
            'status' => 'Active',
            'user_id' => '1'

        ]);
        Device::create([
            'nama' => 'Lampu Taman',
            'deskripsi' => 'Televisi ruangan',
            'status' => 'Non-Active',
            'user_id' => '1'

        ]);
    }
}
