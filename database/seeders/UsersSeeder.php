<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'admin',
                'email' => 'admin@mail.com',
                'password' => bcrypt('12345'),
            ],
            [
                'name' => 'user',
                'email' => 'user@mail.com',
                'password' => bcrypt('12345'),
            ],
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
