<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->create([
            'name' => 'Olena',
            'email' => 'elena.voznuk@gmail.com',
            'password' => Hash::make('12345')
        ]);
    }
}
